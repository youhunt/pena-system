<?php

namespace App\Controllers;

use App\Models\CostTypeModel;
use Config\Services;

class CostType extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'costtype';

        $data['title'] = 'CostType';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'CostType']);
        $data['page_title'] = view('partials/page-title', ['title' => 'CostType', 'pagetitle' => 'Costing']);
        return view('costtype/index', $data);
	}

    public function getCostType()  
    {

        $request = Services::request();
        $datatable = new CostTypeModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['type'] = $list->type;
                $row['description'] = $list->description;
                $row['group'] = $list->group;
                $row['active'] = $list->active;
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
            'title' => 'Add CostType',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'costtype';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'CostType']);
        $data['page_title'] = view('partials/page-title', ['title' => 'CostType', 'pagetitle' => 'Costing']);

        return view('costtype/add', $data);            
    }

    public function save()
    {
        $rules = [
            'type'      => 'required|is_unique[cost_type.type]|min_length[1]|max_length[4]',
            'description'      => 'required',
            'group'      => 'required',  
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CostTypeModel($request);
            $data = [
                'type' => $this->request->getVar('type'),
                'description' => $this->request->getVar('description'),
                'group' => $this->request->getVar('group'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/costtype/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCostType = new CostTypeModel($request);
    
        $data = [            
            'title' => 'Update CostType',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'costtype';
        $data['costtype'] = $dataCostType->getCostType($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'CostType']);
        $data['page_title'] = view('partials/page-title', ['title' => 'CostType', 'pagetitle' => 'Costing']);

        return view('costtype/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'type'      => 'required',
            'description'      => 'required',
            'group'      => 'required',  
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CostTypeModel($request);
            $data = [
                'type' => $this->request->getVar('type'),
                'description' => $this->request->getVar('description'),
                'group' => $this->request->getVar('group'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/costtype/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new CostTypeModel($request);
        $active =  $this->request->getVar('active');
        $data = [
            'deleted_at' => date("Y-m-d H:i:s"),
            'deleted_by' =>  user()->username,
            'active' => 0,
        ];
        if ($active == "0") {
            $data = [
                'deleted_at' => null,
                'deleted_by' =>  null,
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
                'active' => 1,
            ];
        }
        $model->deleteData($id, $data);
        
        return redirect()->to(base_url('/costtype/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('costtype');   

        $query = $builder->like('uom_desc', $this->request->getVar('q'))
                    ->select('id, uom_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}