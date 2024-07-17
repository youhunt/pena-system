<?php

namespace App\Controllers;

use App\Models\ConvUOMModel;
use Config\Services;

class ConvUOM extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'convuom';

        $data['title'] = 'ConvUOM';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ConvUOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ConvUOM', 'pagetitle' => 'MasterData']);
        return view('convuom/index', $data);
	}

    public function getConvUOM()  
    {

        $request = Services::request();
        $datatable = new ConvUOMModel($request);
        
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
            'title' => 'Add ConvUOM',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'convuom';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ConvUOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ConvUOM', 'pagetitle' => 'MasterData']);

        return view('convuom/add', $data);            
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
            $model = new ConvUOMModel($request);
            $data = [
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/convuom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataConvUOM = new ConvUOMModel($request);
    
        $data = [            
            'title' => 'Update ConvUOM',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'convuom';
        $data['convuom'] = $dataConvUOM->getConvUOM($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ConvUOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ConvUOM', 'pagetitle' => 'MasterData']);

        return view('convuom/edit', $data);            
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
            $model = new ConvUOMModel($request);
            $data = [
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/convuom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new ConvUOMModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/convuom/index'));
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