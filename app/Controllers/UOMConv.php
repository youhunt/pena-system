<?php

namespace App\Controllers;

use App\Models\UOMConvModel;
use Config\Services;

class UOMConv extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'uomconv';

        $data['title'] = 'UOMConv';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOMConv', 'pagetitle' => 'MasterData']);
        return view('uomconv/index', $data);
	}

    public function getUOMConv()  
    {

        $request = Services::request();
        $datatable = new UOMConvModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');
            //'fr_uom', 'to_uom', 'value',
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['fr_uom'] = $list->fr_uom;
                $row['to_uom'] = $list->to_uom;
                $row['value'] = $list->value;
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
            'title' => 'Add UOMConv',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'uomconv';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOMConv', 'pagetitle' => 'MasterData']);

        return view('uomconv/add', $data);            
    }

    public function save()
    {
        $rules = [
            'fr_uom'      => 'required',
            'to_uom'      => 'required',
            'value'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new UOMConvModel($request);
            $data = [
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/uomconv/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataUOMConv = new UOMConvModel($request);
    
        $data = [            
            'title' => 'Update UOMConv',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'uomconv';
        $data['uomconv'] = $dataUOMConv->getUOMConv($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'UOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'UOMConv', 'pagetitle' => 'MasterData']);

        return view('uomconv/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'fr_uom'      => 'required',
            'to_uom'      => 'required',
            'value'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new UOMConvModel($request);
            $data = [
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/uomconv/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new UOMConvModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/uomconv/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('uomconv');   

        $query = $builder->like('fr_uom', $this->request->getVar('q'))
                    ->orLike('to_uom', $this->request->getVar('q'))
                    ->select('fr_uom as id, to_uom as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}