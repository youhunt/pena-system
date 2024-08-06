<?php

namespace App\Controllers;

use App\Models\ItmUOMConvModel;
use App\Models\UOMModel;
use App\Models\WarehouseModel;
use App\Models\DepartmentModel;
use App\Models\SiteModel;
use App\Models\ItemModel;
use Config\Services;


class ItmUOMConv extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'itmuomconv';

        $data['title'] = lang('Files.'.'ItmUOMConv'.'');
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ItmUOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ItmUOMConv', 'pagetitle' => 'ItemMaster']);
        return view('itmuomconv/index', $data);
	}

    public function getItmUOMConv()  
    {

        $request = Services::request();
        $datatable = new ItmUOMConvModel($request);
        $dataUOM = new UOMModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataItem = new ItemModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');
            //'fr_uom', 'to_uom', 'value',
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['itemcode'] = $list->itemcode ? $dataItem->getItem($list->itemcode)[0]->item_name_1 : "";;
                $row['dept'] = $list->dept ? $dataDep->getDepartment($list->dept)[0]->dept_name : "";
                $row['site'] = $list->site ? $dataSit->getSite($list->site)[0]->site_name : "";
                $row['whs'] = $list->whs ? $dataWhs->getWarehouse($list->whs)[0]->whs_name : "";
                $row['fr_uom'] = $list->fr_uom ? $dataUOM->getUOM($list->fr_uom)[0]->uom_desc : "";
                $row['to_uom'] = $list->to_uom ? $dataUOM->getUOM($list->to_uom)[0]->uom_desc : "";
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
            'title' => 'Add ItmUOMConv',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'itmuomconv';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ItmUOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ItmUOMConv', 'pagetitle' => 'ItemMaster']);

        return view('itmuomconv/add', $data);            
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
            $model = new ItmUOMConvModel($request);
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

            return redirect()->to(base_url('/itmuomconv/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataItmUOMConv = new ItmUOMConvModel($request);
        $dataItem = new ItemModel($request);
        $dataUOM = new UOMModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);

        $data = [            
            'title' => 'Update ItmUOMConv',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'itmuomconv';
        $data['itmuomconv'] = $dataItmUOMConv->getItmUOMConv($id);
        $data['itemname'] = $data['itmuomconv'][0]->itemcode ? $dataItem->getItem($data['itmuomconv'][0]->itemcode)[0]->item_code."|".$dataItem->getItem($data['itmuomconv'][0]->itemcode)[0]->item_name_1 : "";
        $data['dept_name'] = $data['itmuomconv'][0]->dept ? $dataDep->getDepartment($data['itmuomconv'][0]->dept)[0]->dept_code."|".$dataDep->getDepartment($data['itmuomconv'][0]->dept)[0]->dept_name : "";
        $data['site_name'] = $data['itmuomconv'][0]->site ? $dataSit->getSite($data['itmuomconv'][0]->site)[0]->site_code."|".$dataSit->getSite($data['itmuomconv'][0]->site)[0]->site_name : "";
        $data['whs_name'] = $data['itmuomconv'][0]->whs ? $dataWhs->getWarehouse($data['itmuomconv'][0]->whs)[0]->whs_code."|".$dataWhs->getWarehouse($data['itmuomconv'][0]->whs)[0]->whs_name : "";
        $data['fr_uom_name'] = $data['itmuomconv'][0]->fr_uom ? $dataUOM->getUOM($data['itmuomconv'][0]->fr_uom)[0]->uom_code."|".$dataUOM->getUOM($data['itmuomconv'][0]->fr_uom)[0]->uom_desc : "";
        $data['to_uom_name'] = $data['itmuomconv'][0]->to_uom ? $dataUOM->getUOM($data['itmuomconv'][0]->to_uom)[0]->uom_code."|".$dataUOM->getUOM($data['itmuomconv'][0]->to_uom)[0]->uom_desc : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'ItmUOMConv']);
        $data['page_title'] = view('partials/page-title', ['title' => 'ItmUOMConv', 'pagetitle' => 'ItemMaster']);

        return view('itmuomconv/edit', $data);            
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
            $model = new ItmUOMConvModel($request);
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

            return redirect()->to(base_url('/itmuomconv/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new ItmUOMConvModel($request);
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
        
        return redirect()->to(base_url('/itmuomconv/index'));
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