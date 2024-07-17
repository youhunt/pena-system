<?php

namespace App\Controllers;

use App\Models\UOMModel;
use Config\Services;

class UOM extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'uom';

        $data['title'] = 'UOM';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOM', 'pagetitle' => 'MasterData']);
        return view('uom/index', $data);
	}

    public function getUOM()  
    {

        $request = Services::request();
        $datatable = new UOMModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['uom_code'] = $list->uom_code;
                $row['uom_desc'] = $list->uom_desc;
                $row['uomdec'] = $list->uomdec;
                $row['no'] = '';
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

    public function add()
    {        
    
        $data = [            
            'title' => 'Add UOM',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'uom';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOM', 'pagetitle' => 'MasterData']);

        return view('uom/add', $data);            
    }

    public function save()
    {
        $rules = [
            'uom_code' => 'required|min_length[1]|max_length[4]|is_unique[uom.uom_code]',
            'uom_desc' => 'required',
            'uomdec' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new UOMModel($request);
            $data = [
                'uom_code' => $this->request->getVar('uom_code'),
                'uom_desc' => $this->request->getVar('uom_desc'),
                'uomdec' => $this->request->getVar('uomdec'),
                // 'create_date'=>  date("Y-m-d H:i:s"),
                // 'create_by' =>  user()->username,
                // 'active' => 1
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/uom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataUOM = new UOMModel($request);
    
        $data = [            
            'title' => 'Update UOM',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'uom';
        $data['uom'] = $dataUOM->getUOM($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOM', 'pagetitle' => 'MasterData']);

        return view('uom/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'uom_code'      => 'required|min_length[1]|max_length[4]|is_unique[uom.uom_code,id,'.$id.']',
            'uom_desc'      => 'required',
            'uomdec' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new UOMModel($request);
            $data = [
                'uom_code' => $this->request->getVar('uom_code'),
                'uom_desc' => $this->request->getVar('uom_desc'),
                'uomdec' => $this->request->getVar('uomdec'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/uom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new UOMModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/uom/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('uom');   

        $query = $builder->like('uom_desc', $this->request->getVar('q'))
                    ->select('uom_code as id, uom_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}