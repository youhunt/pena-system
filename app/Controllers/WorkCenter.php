<?php

namespace App\Controllers;

use App\Models\WorkCenterModel;
use App\Models\WorkCenterChildModel;
use App\Models\UOMModel;
use App\Models\SiteModel;
use App\Models\DepartmentModel;
use App\Models\WarehouseModel;
use App\Models\ItemModel;
use Config\Services;


class WorkCenter extends BaseController
{

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'work_center';

        $data['title'] = 'WorkCenter';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'WorkCenter']);
        $data['page_title'] = view('partials/page-title', ['title' => 'WorkCenter', 'pagetitle' => 'MasterData']);
        return view('work_center/index', $data);
	}

    public function getWorkCenter()  
    {

        $request = Services::request();
        $datatable = new WorkCenterModel($request);
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
                $row['type'] = lang('WorkCenter.type'.$list->type);
                $row['qty'] = number_format((float)$list->qty, 2, '.', '');;
                $row['uom'] = $list->uom ? $dataUOM->getUOM($list->uom)[0]->uom_desc : "";
                $row['ratio'] = number_format((float)$list->ratio, 2, '.', '');
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

    public function getWorkCenterChild()  
    {

        $request = Services::request();
        $datatable = new WorkCenterChildModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);
        $work_center_id = $request->getPost('work_center_id');

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatablesByWorkCenter($work_center_id);
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['work_center_id'] = $list->work_center_id;
                $row['childno'] = $list->childno;
                $row['childcode'] = $list->childcode ? $dataItem->getItem($list->childcode)[0]->item_name_1 : "";
                $row['childtype'] = lang('WorkCenter.typechild'.$list->childtype);
                $row['qtyused'] = number_format((float)$list->qtyused, 2, '.', '');
                $row['childuom'] = $list->childuom ? $dataUOM->getUOM($list->childuom)[0]->uom_desc : "";
                $row['factor'] = number_format((float)$list->factor, 0, '.', '');
                $row['childdescription'] = $list->childdescription;
                $row['active'] = $list->active;
                $row['no'] = '';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAllByWorkCenter($work_center_id),
                'recordsFiltered' => $datatable->countFilteredByWorkCenter($work_center_id),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function getWorkCenterChildById() {
        $request = Services::request();
        $dataBC = new WorkCenterChildModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);
        $id =  $this->request->getVar('id');
        $lists = $dataBC->getWorkCenterChild($id);
        $data = [];
        $no = $request->getPost('start');

        foreach ($lists as $list) {
            $row = [];
            $row['id'] = $list->id;
            $row['work_center_id'] = $list->work_center_id;
            $row['childno'] = $list->childno;
            $row['childcode'] = $list->childcode;
            $row['itemchildname'] = $list->childcode ? $dataItem->getItem($list->childcode)[0]->item_code."|".$dataItem->getItem($list->childcode)[0]->item_name_1 : "";
            $row['childtype'] = lang('WorkCenter.typechild'.$list->childtype);
            $row['qtyused'] = number_format((float)$list->qtyused, 2, '.', '');
            $row['childuom'] = $list->childuom;
            $row['childuom_desc'] = $list->childuom ?  $dataUOM->getUOM($list->childuom)[0]->uom_code."|".$dataUOM->getUOM($list->childuom)[0]->uom_desc : "";
            $row['factor'] = $list->factor;
            $row['childdescription'] = $list->childdescription;
            $row['active'] = $list->active;
            $data[] = $row;
        }
        echo json_encode($data);
    }

    public function add()
    {        
    
        $data = [            
            'title' => 'Add WorkCenter',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'work_center';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'WorkCenter']);
        $data['page_title'] = view('partials/page-title', ['title' => 'WorkCenter', 'pagetitle' => 'MasterData']);

        return view('work_center/add', $data);            
    }

    public function save()
    {
        $rules = [
            'site' => 'required',
            'dept' => 'required',
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
            $model = new WorkCenterModel($request);
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

            try
            {
                $model->save($data);
                $id = $model->getInsertID();
                return redirect()->to(base_url('/work_center/edit/'.$id));
            }
            catch (\CodeIgniter\Database\Exceptions\DatabaseException $e)
            {
                if ($e->getCode() === 1062)
                {
                    $error = ['Data already exists.'];
                    return redirect()->back()->withInput()->with('errors', $error);
                }

            } 

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function saveChild()
    {
        $id =  $this->request->getVar('id');
        $work_center_id =  $this->request->getVar('work_center_id');
        
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
            $model = new WorkCenterChildModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'work_center_id' => $id,
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
                
                $model->save($data);
                
                return redirect()->to(base_url('/work_center/edit/'.$id));

            } else  {
                $data = [
                    'work_center_id' => $work_center_id,
                    'childno' => $this->request->getVar('childno'),
                    'childcode' => $this->request->getVar('childcode'),
                    'childtype' => $this->request->getVar('childtype'),
                    'qtyused' => $this->request->getVar('qtyused'),
                    'childuom' => $this->request->getVar('childuom'),
                    'factor' => $this->request->getVar('factor'),
                    'childdescription' => $this->request->getVar('childdescription'),
                    'updated_by' =>  user()->username,
                    'updated_at' =>  date("Y-m-d H:i:s"),
                ];
                
                $model->updateData($id, $data);

                return redirect()->to(base_url('/work_center/edit/'.$work_center_id));

            }


        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataWorkCenter = new WorkCenterModel($request);
        $dataUOM = new UOMModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataItem = new ItemModel($request);

        $data = [            
            'title' => 'Update WorkCenter',
            'title_child' => 'WorkCenter Child',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'work_center';
        $data['work_center'] = $dataWorkCenter->getWorkCenter($id);
        $dataIt = $dataItem->getItem($data['work_center'][0]->parentcode)[0];
        $dataSi = $dataSit->getSite($data['work_center'][0]->site)[0];
        $dataDe = $dataDep->getDepartment($data['work_center'][0]->dept)[0];
        $dataUo = $dataUOM->getUOM($data['work_center'][0]->uom)[0];

        $data['site_name'] = $data['work_center'][0]->site ? $dataSi->site_code."|".$dataSi->site_name : "|";
        $data['dept_name'] = $data['work_center'][0]->dept ? $dataDe->dept_code . "|". $dataDe->dept_name : "|";
        $data['whs_name'] = $data['work_center'][0]->whs ? $dataWhs->getWarehouse($data['work_center'][0]->whs)[0]->whs_code."|".$dataWhs->getWarehouse($data['work_center'][0]->whs)[0]->whs_name : "|";
        $data['itemname'] = $data['work_center'][0]->parentcode ? $dataIt->item_code."|".$dataIt->item_name_1 : "|";
        $data['uom_desc'] = $data['work_center'][0]->uom ? $dataUo->uom_code."|".$dataUo->uom_desc : "|";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'WorkCenter']);
        $data['page_title'] = view('partials/page-title', ['title' => 'WorkCenter', 'pagetitle' => 'MasterData']);

        return view('work_center/edit', $data);            
    }

    function check_code() {
        $site = $this->input->post('site');
        $dept = $this->input->post('dept');
        $whs = $this->input->post('whs');
        $parentcode  = $this->input->post('parentcode');
        $this->db->select('id');
        $this->db->from('work_center');
        $this->db->where('site', $site)
                ->where('dept', $dept)
                ->where('whs', $whs)
                ->where('parentcode', $parentcode);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'site' => 'required',
            'dept' => 'required',
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
            $model = new WorkCenterModel($request);
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
            
            try
            {
                $model->updateData($id, $data);
                return redirect()->to(base_url('/work_center/index'));
            }
            catch (\CodeIgniter\Database\Exceptions\DatabaseException $e)
            {
                if ($e->getCode() === 1062)
                {
                    $error = ['Data already exists.'];
                    return redirect()->back()->withInput()->with('errors', $error);
                }

            } 


        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new WorkCenterModel($request);
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
        
        return redirect()->to(base_url('/work_center/index'));
    }

    public function deleteChild()
    {
        $id =  $this->request->getVar('id');
        $work_center_id =  $this->request->getVar('work_center_id');
        $request = Services::request();
        $model = new WorkCenterChildModel($request);
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
        
        return redirect()->to(base_url('/work_center/edit/'.$work_center_id));

    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('work_center');   

        $query = $builder->like('work_center_desc', $this->request->getVar('q'))
                    ->select('id, work_center_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}