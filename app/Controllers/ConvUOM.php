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

        $data['title'] = lang('Files.'.'ConvUOM'.'');
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
                $row['itemcode'] = $list->itemcode;
                $row['site'] = $list->site;
                $row['dept'] = $list->dept;
                $row['whs'] = $list->whs;
                $row['fr_uom'] = $list->fr_uom;
                $row['to_uom'] = $list->to_uom;
                $row['value'] = $list->value;
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
            'itemcode' => 'required',
            'site' => 'required',
            'dept' => 'required',
            'whs' => 'required',
            'fr_uom' => 'required',
            'to_uom' => 'required',
            'value' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ConvUOMModel($request);
            $data = [
                'itemcode' => $this->request->getVar('itemcode'),
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'whs' => $this->request->getVar('whs'),
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
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
        $data['dept_name'] = $data['convuom'][0]->dept ? $dataDep->getDepartment($data['convuom'][0]->dept)[0]->dept_name : "";
        $data['site_name'] = $data['convuom'][0]->site ? $dataSit->getSite($data['convuom'][0]->site)[0]->site_name : "";
        $data['whs_name'] = $data['convuom'][0]->whs ? $dataWhs->getWarehouse($data['convuom'][0]->whs)[0]->whs_name : "";
        $data['fr_uom_name'] = $data['convuom'][0]->fr_uom ? $dataWhs->getWarehouse($data['convuom'][0]->fr_uom)[0]->uom_desc : "";
        $data['to_uom_name'] = $data['convuom'][0]->to_uom ? $dataWhs->getWarehouse($data['convuom'][0]->to_uom)[0]->uom_desc : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ConvUOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ConvUOM', 'pagetitle' => 'MasterData']);

        return view('convuom/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'itemcode' => 'required',
            'site' => 'required',
            'dept' => 'required',
            'whs' => 'required',
            'fr_uom' => 'required',
            'to_uom' => 'required',
            'value' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ConvUOMModel($request);
            $data = [
                'itemcode' => $this->request->getVar('itemcode'),
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'whs' => $this->request->getVar('whs'),
                'fr_uom' => $this->request->getVar('fr_uom'),
                'to_uom' => $this->request->getVar('to_uom'),
                'value' => $this->request->getVar('value'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
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