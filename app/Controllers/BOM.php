<?php

namespace App\Controllers;

use App\Models\BOMModel;
use App\Models\BOMChildModel;
use App\Models\UOMModel;
use App\Models\SiteModel;
use App\Models\DepartmentModel;
use App\Models\WarehouseModel;
use App\Models\ItemModel;
use Config\Services;

class BOM extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'bom';

        $data['title'] = 'BOM';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'BOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'BOM', 'pagetitle' => 'MasterData']);
        return view('bom/index', $data);
	}

    public function getBOM()  
    {

        $request = Services::request();
        $datatable = new BOMModel($request);
        $dataUOM = new UOMModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataItem = new ItemModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['site'] = $list->site ? $dataSit->getSite($list->site)[0]->site_name : "";
                $row['dept'] = $list->dept ? $dataDep->getDepartment($list->dept)[0]->dept_name : "";
                $row['whs'] = $list->whs ? $dataWhs->getWarehouse($list->whs)[0]->whs_name : "";
                $row['parentcode'] = $list->parentcode ? $dataItem->getItem($list->parentcode)[0]->item_name_1 : "";
                $row['type'] = lang('BOM.type'.$list->type);
                $row['qty'] = $list->qty;
                $row['uom'] = $list->uom ? $dataUOM->getUOM($list->uom)[0]->uom_desc : "";
                $row['ratio'] = $list->ratio;
                $row['description'] = $list->description;
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

    public function getBOMChild()  
    {

        $request = Services::request();
        $datatable = new BOMChildModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['childno'] = $list->childno;
                $row['childcode'] = $list->childcode ? $dataItem->getItem($list->childcode)[0]->item_name_1 : "";
                $row['childtype'] = lang('BOM.typechild'.$list->childtype);
                $row['qtyused'] = $list->qtyused;
                $row['childuom'] = $list->childuom ? $dataUOM->getUOM($list->childuom)[0]->uom_desc : "";
                $row['factor'] = $list->factor;
                $row['childdescription'] = $list->childdescription;
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

    public function getBOMChildById() {
        $request = Services::request();
        $dataBC = new BOMChildModel($request);
        $id =  $this->request->getVar('id');
        $data['data'] = $dataBC->getBOMChild($id);
        return $data;
    }

    public function add()
    {        
    
        $data = [            
            'title' => 'Add BOM',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'bom';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'BOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'BOM', 'pagetitle' => 'MasterData']);

        return view('bom/add', $data);            
    }

    public function save()
    {
        $rules = [
            'site' => 'required',
            'dept' => 'required',
            'whs' => 'required',
            'parentcode' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'ratio' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new BOMModel($request);
            $data = [
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'whs' => $this->request->getVar('whs'),
                'parentcode' => $this->request->getVar('parentcode'),
                'type' => $this->request->getVar('type'),
                'qty' => $this->request->getVar('qty'),
                'uom' => $this->request->getVar('uom'),
                'ratio' => $this->request->getVar('ratio'),
                'description' => $this->request->getVar('description'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/bom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function saveChild()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'childno' => 'required',
            'childcode' => 'required',
            'childtype' => 'required',
            'qtyused' => 'required',
            'childuom' => 'required',
            'factor' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new BOMChildModel($request);
            $data = [
                'bom_id' => $id,
                'childno' => $this->request->getVar('childno'),
                'childcode' => $this->request->getVar('childcode'),
                'childtype' => $this->request->getVar('childtype'),
                'qtyused' => $this->request->getVar('qtyused'),
                'childuom' => $this->request->getVar('childuom'),
                'factor' => $this->request->getVar('factor'),
                'childdescription' => $this->request->getVar('childdescription'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];

            try {
                $model->save($data);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }

            return redirect()->to(base_url('/bom/edit/'.$id));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataBOM = new BOMModel($request);
        $dataUOM = new UOMModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataItem = new ItemModel($request);

        $data = [            
            'title' => 'Update BOM',
            'title_child' => 'BOM Child',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'bom';
        $data['bom'] = $dataBOM->getBOM($id);
        $data['site_name'] = $data['bom'][0]->site ? $dataSit->getSite($data['bom'][0]->site)[0]->site_name : "";
        $data['dept_name'] = $data['bom'][0]->dept ? $dataDep->getDepartment($data['bom'][0]->dept)[0]->dept_name : "";
        $data['whs_name'] = $data['bom'][0]->whs ? $dataWhs->getWarehouse($data['bom'][0]->whs)[0]->whs_name : "";
        $data['itemname'] = $data['bom'][0]->parentcode ? $dataItem->getItem($data['bom'][0]->parentcode)[0]->item_name_1 : "";
        $data['uom_desc'] = $data['bom'][0]->uom ? $dataUOM->getUOM($data['bom'][0]->uom)[0]->uom_desc : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'BOM']);
        $data['page_title'] = view('partials/page-title', ['title' => 'BOM', 'pagetitle' => 'MasterData']);

        return view('bom/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'site' => 'required',
            'dept' => 'required',
            'whs' => 'required',
            'parentcode' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'uom' => 'required',
            'ratio' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new BOMModel($request);
            $data = [
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'whs' => $this->request->getVar('whs'),
                'parentcode' => $this->request->getVar('parentcode'),
                'type' => $this->request->getVar('type'),
                'qty' => $this->request->getVar('qty'),
                'uom' => $this->request->getVar('uom'),
                'ratio' => $this->request->getVar('ratio'),
                'description' => $this->request->getVar('description'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/bom/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new BOMModel($request);
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
        
        return redirect()->to(base_url('/bom/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('bom');   

        $query = $builder->like('bom_desc', $this->request->getVar('q'))
                    ->select('id, bom_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}