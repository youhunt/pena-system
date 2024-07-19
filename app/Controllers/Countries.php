<?php

namespace App\Controllers;

use App\Models\CountriesModel;
use Config\Services;

class Countries extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'countries';

        $data['title'] = 'Countries';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Countries']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Countries', 'pagetitle' => 'MasterData']);
        return view('countries/index', $data);
	}

    public function getCountries()  
    {

        $request = Services::request();
        $datatable = new CountriesModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['country_code'] = $list->country_code;
                $row['country_name'] = $list->country_name;
                $data[] = $row;
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

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('countries');   

        $query = $builder->like('name', $this->request->getVar('q'))
                    ->select('id, name as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function getCountry($id = null)
    {
        $request = Services::request();
        $model = new CountriesModel($request);
        $data = $model->getCountry($id);
        return json_encode($data);
    }

    public function add()
    {        
        $request = Services::request();
        $dataCou = new CountriesModel($request);
    
        $data = [            
            'title' => 'Add Countries',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'countries';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Countries']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Countries', 'pagetitle' => 'MasterData']);

        return view('countries/add', $data);            
    }

    public function save()
    {
        $rules = [
            'country_code'      => 'required|is_unique[countries.country_code]|min_length[3]|max_length[12]',
            'country_name'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CountriesModel($request);
            $data = [
                'country_code' => $this->request->getVar('country_code'),
                'country_name' => $this->request->getVar('country_name'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/countries/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCountry = new CountriesModel($request);
    
        $data = [            
            'title' => 'Update Countries',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'countries';
        $data['countries'] = $dataCountry->getCountries($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Countries']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Countries', 'pagetitle' => 'MasterData']);

        return view('countries/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('country_code');
        $rules = [
            'country_code'      => 'required', //|is_unique[countries.country_code,'.$id.']|min_length[3]|max_length[12]
            'country_name'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CountriesModel($request);
            $data = [
                'country_code' => $this->request->getVar('country_code'),
                'country_name' => $this->request->getVar('country_name'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/countries/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new CountriesModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/countries/index'));
    }
}