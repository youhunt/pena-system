<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Password;
use \Myth\Auth\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

// datatables
use Config\Services;
use App\Models\UsersModel;

class Users extends BaseController
{
    protected $auth;
 
    protected $config;
    
    public function __construct()
    {
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function dashboard() {
        $data = [            
            'title' => 'Dashboard',
    
        ];
        $data['menu'] = 'utility';
        $data['submenu'] = 'users';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Users']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Users', 'pagetitle' => 'MasterData']);
       
        return view('users/dashboard', $data); 
    }

    public function add()
    {        
    
        $data = [            
            'title' => 'Add Users',
            'config' => $this->config,
        ];
        $data['menu'] = 'utility';
        $data['submenu'] = 'users';

        return view('users/add', $data);            
    }

    public function save()
    {
        $users = model(UserModel::class);
    
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));
    
        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();
    
        // Ensure default group gets assigned if set
        if (! empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }
    
        if (! $users->save($user))
        {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }
    
        if ($this->config->requireActivation !== null)
        {
            $activator = service('activator');
            $sent = $activator->send($user);
    
            if (! $sent)
            {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }
    
            // Success!
            return redirect()->to(base_url('/users/index'));
        }
    
        // Success!
        return redirect()->to(base_url('/users/index'));
    }

    public function index()
	{
        $groupModel = new GroupModel();

        $data['groups'] = $groupModel->findAll();
        $data['menu'] = 'utility';
        $data['submenu'] = 'users';

        $data['title'] = 'Users';
        return view('users/index', $data);
	}

    public function getUsers()  
    {
        $request = Services::request();
        $datatable = new UsersModel($request);
        
        $groupModel = new GroupModel();

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                if ($list->id !== '1') {
                    $row = [];
                    $row['id'] = $list->id;
                    $row['username'] = $list->username;
                    $row['group'] = $groupModel->getGroupsForUser($list->id)[0]['name'];
                    $row['email'] = $list->email;
                    $row['active'] = $list->active;
                    $row['no'] = $no;
                    $data[] = $row;
                }
                
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function activate()
    {
        $userId = $this->request->getVar('id');
        if (($userId==null) || ($userId === '1') || $userId === '2') {
            return redirect()->to(base_url('/users/index'));            
        }
        else 
        {            
            $userModel = new UserModel();

            $data = [ 
                'activate_hash' => null,
                'active' => $this->request->getVar('active') == '0' || '' ? '1' : '0',
            ];
            $userModel->update($userId, $data);        

            return redirect()->to(base_url('/users/index'));
        }
    }

    public function changePassword($id = null)
    {
        if (($id==null) || ($id === '1'))
        {
            return redirect()->to(base_url('/users/index'));
        } 
        else
        {
            $groupModel = new GroupModel();
            $group = $groupModel->getGroupsForUser($id);
            if ($group[0]['name'] === 'administrator') {
                return redirect()->to(base_url('/users/index'));
            } else {
                $data = [            
                    'id' => $id,
                    'title' => 'Update Password',
                ];
                $data['menu'] = 'utility';
                $data['submenu'] = 'users';    
                return view('users/set_password', $data);  
            }
        }
    }

    public function setPassword()
    {
        $id = $this->request->getVar('id');
        if (($id==null) || ($id === 1))
        {
            return redirect()->to(base_url('/users/index'));
        }
        $rules = [
			'password'     => 'required|strong_password',
			'pass_confirm' => 'required|matches[password]',
		];

		if (! $this->validate($rules))
		{
            $data = [            
                'id' => $id,
                'title' => 'Update Password',
                'validation' => $this->validator,
            ];
            $data['menu'] = 'utility';
            $data['submenu'] = 'users';

            return view('users/set_password', $data);
		}
        else 
        {
            $userModel = new UserModel();
            $data = [            
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];
            $userModel->update($this->request->getVar('id'), $data);  

            return redirect()->to(base_url('/users/index'));
        }
    }

    public function changeGroup()
    {
        $userId = $this->request->getVar('id');
        
        if (($userId==null) || ($userId === '1') || $userId === '2') {
            return redirect()->to(base_url('/users/index'));
        }

        $groupId = $this->request->getVar('group');

        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));

        return redirect()->to(base_url('/users/index'));

    }
}
