<?php

namespace App\Controllers;

use App\Models\WorkCenterModel;
use App\Models\WorkCenterMachineModel;
use App\Models\WorkCenterCostModel;
use App\Models\UOMModel;
use App\Models\SiteModel;
use App\Models\DepartmentModel;
use App\Models\WarehouseModel;
use App\Models\ItemModel;
use Config\Services;

use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Database\Exceptions\DatabaseException;

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
                $row['warehouse'] = $list->warehouse ? $dataWhs->getWarehouse($list->warehouse)[0]->whs_name : "";
                $row['workcenter'] = $list->workcenter;
                $row['description'] = $list->description;
                $row['active'] = $list->active;
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

    public function getWorkCenterMachine()  
    {

        $request = Services::request();
        $datatable = new WorkCenterMachineModel($request);
        $dataUOM = new UOMModel($request);
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
                $row['no'] = $list->no;
                $row['machine'] = $list->machine;
                $row['notes1'] = $list->notes1;
                $row['speed'] = $list->speed;
                $row['capacity'] = $list->capacity;
                $row['length'] = $list->length;
                $row['luom'] = $list->luom ?  ($dataUOM->getUOM($list->luom) ? $dataUOM->getUOM($list->luom)[0]->uom_code : "") : "";
                $row['width'] = $list->width;
                $row['wuom'] = $list->wuom ?  ($dataUOM->getUOM($list->wuom) ? $dataUOM->getUOM($list->wuom)[0]->uom_code : "") : "";
                $row['height'] = $list->height;
                $row['huom'] = $list->huom ?  ($dataUOM->getUOM($list->huom) ? $dataUOM->getUOM($list->huom)[0]->uom_code : "") : "";
                $row['volume'] = $list->volume;
                $row['vuom'] = $list->vuom ?  ($dataUOM->getUOM($list->vuom) ? $dataUOM->getUOM($list->vuom)[0]->uom_code : "") : "";
                $row['qtylabor'] = $list->qtylabor;
                $row['workhour'] = $list->workhour;
                $row['active'] = $list->active;
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

    public function getWorkCenterCost()  
    {

        $request = Services::request();
        $datatable = new WorkCenterCostModel($request);
        $dataUOM = new UOMModel($request);
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
                $row['costtype'] = $list->costtype;
                $row['costamount'] = $list->costamount;
                $row['costuom'] = $list->costuom ?  ($dataUOM->getUOM($list->costuom) ? $dataUOM->getUOM($list->costuom)[0]->uom_code : "") : "";
                $row['notes2'] = $list->notes2;
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

    public function getWorkCenterMachineById() {
        $request = Services::request();
        $dataBC = new WorkCenterMachineModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);
        $id =  $this->request->getPost('id');
        $lists = $dataBC->getWorkCenterMachine($id);
        $data = [];
        $no = $request->getPost('start');

        foreach ($lists as $list) {
            $row = [];
            $row['id'] = $list->id;
            $row['work_center_id'] = $list->work_center_id;
            $row['no'] = $list->no;
            $row['machine'] = $list->machine;
            $row['notes1'] = $list->notes1;
            $row['speed'] = $list->speed;
            $row['capacity'] = $list->capacity;
            $row['length'] = number_format((float)$list->length, 5, '.', '');
            $row['luom'] = $list->luom;
            $row['luom_desc'] = $list->luom ?  $dataUOM->getUOM($list->luom)[0]->uom_code."|".$dataUOM->getUOM($list->luom)[0]->uom_desc : "";
            $row['width'] = number_format((float)$list->width, 5, '.', '');
            $row['wuom'] = $list->wuom;
            $row['wuom_desc'] = $list->wuom ?  $dataUOM->getUOM($list->wuom)[0]->uom_code."|".$dataUOM->getUOM($list->wuom)[0]->uom_desc : "";
            $row['height'] =  number_format((float)$list->height, 5, '.', '');
            $row['huom'] = $list->huom;
            $row['huom_desc'] = $list->huom ?  $dataUOM->getUOM($list->huom)[0]->uom_code."|".$dataUOM->getUOM($list->huom)[0]->uom_desc : "";
            $row['volume'] = number_format((float)$list->volume, 5, '.', '');
            $row['vuom'] = $list->vuom;
            $row['vuom_desc'] = $list->vuom ?  $dataUOM->getUOM($list->vuom)[0]->uom_code."|".$dataUOM->getUOM($list->vuom)[0]->uom_desc : "";
            $row['qtylabor'] = number_format((float)$list->qtylabor, 5, '.', '');
            $row['workhour'] = $list->workhour;
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
            'warehouse' => 'required',
            'workcenter' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WorkCenterModel($request);
            $data = [
                'site' => $this->request->getPost('site'),
                'dept' => $this->request->getPost('dept'),
                'warehouse' => $this->request->getPost('warehouse'),
                'workcenter' => $this->request->getPost('workcenter'),
                'description' => $this->request->getPost('description'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];

            try
            {
                $model->save($data);
                $id = $model->getInsertID();
                return redirect()->to(base_url('/work_center/edit/'.$id));
            }
            catch (DatabaseException $e)
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

    public function saveMachine()
    {
        $id =  $this->request->getVar('id');
        $work_center_id =  $this->request->getVar('work_center_id');
        
        $rules = [
            'no' => 'required',
            'machine' => 'required',
            'notes1' => 'required',
            'speed' => 'required',
            'capacity' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            //return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $output = [
                'Success' => false,
                'Counter' => 9999,
                'errors' => $this->validator->getErrors(),
            ];

            return json_encode($output);
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WorkCenterMachineModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'work_center_id' => $id,
                    'no' => $this->request->getVar('no'),
                    'machine' => $this->request->getVar('machine'),
                    'notes1' => $this->request->getVar('notes1'),
                    'speed' => $this->request->getVar('speed'),
                    'capacity' => $this->request->getVar('capacity'),
                    'length' => $this->request->getVar('length'),
                    'luom' => $this->request->getVar('luom'),
                    'width' => $this->request->getVar('width'),
                    'wuom' => $this->request->getVar('wuom'),
                    'height' => $this->request->getVar('height'),
                    'huom' => $this->request->getVar('huom'),
                    'volume' => $this->request->getVar('volume'),
                    'vuom' => $this->request->getVar('vuom'),
                    'qtylabor' => $this->request->getVar('qtylabor'),
                    'workhour' => $this->request->getVar('workhour'),
                    'created_date'=>  date("Y-m-d H:i:s"),
                    'created_by' =>  user()->username,
                ];

                try {
                    $saved = $model->save($data);
                    if ($saved) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByWorkCenter($id),
                            'errors' => [],
                        ];
                    } else {
                        $output = [
                            'Success' => false,
                            'Counter' =>  9999,
                            'errors' => $model->errors(),
                        ];
                    }
                } catch (DatabaseException $e) {
                    $output = [
                        'Success' => false,
                        'Counter' =>  9999,
                        'errors' => ['Data already exists.'],
                    ];
                }
                
                return json_encode($output);
                //return redirect()->to(base_url('/work_center/edit/'.$id));

            } else  {
                $data = [
                    'work_center_id' => $work_center_id,
                    'no' => $this->request->getVar('no'),
                    'machine' => $this->request->getVar('machine'),
                    'notes1' => $this->request->getVar('notes1'),
                    'speed' => $this->request->getVar('speed'),
                    'capacity' => $this->request->getVar('capacity'),
                    'length' => $this->request->getVar('length'),
                    'luom' => $this->request->getVar('luom'),
                    'width' => $this->request->getVar('width'),
                    'wuom' => $this->request->getVar('wuom'),
                    'height' => $this->request->getVar('height'),
                    'huom' => $this->request->getVar('huom'),
                    'volume' => $this->request->getVar('volume'),
                    'vuom' => $this->request->getVar('vuom'),
                    'qtylabor' => $this->request->getVar('qtylabor'),
                    'workhour' => $this->request->getVar('workhour'),
                    'updated_by' =>  user()->username,
                    'updated_at' =>  date("Y-m-d H:i:s"),
                ];
                
                try {
                    $updated = $model->updateData($id, $data);

                    if ($updated) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByWorkCenter($work_center_id),
                            'errors' => [],
                        ];
                    } else {
                        $output = [
                            'Success' => false,
                            'Counter' =>  9999,
                            'errors' => $model->errors(),
                        ];
                    }
                } catch (DatabaseException $e) {
                    $output = [
                        'Success' => false,
                        'Counter' =>  9999,
                        'errors' => ['Data already exists.'],
                    ];
                }

                return json_encode($output);
            }


        } else {
            
            //return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $output = [
                'Success' => false,
                'Counter' => 9999,
                'errors' => $this->validator->getErrors(),
            ];

            return json_encode($output);

        }
    
    }

    public function saveCost()
    {
        $id =  $this->request->getVar('id');
        $work_center_id =  $this->request->getVar('work_center_id');
        
        $rules = [
            'costtype' => 'required',
            'costamount' => 'required',
            'costuom' => 'required',
            'notes2' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            //return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $output = [
                'Success' => false,
                'Counter' => 9999,
                'errors' => $this->validator->getErrors(),
            ];

            return json_encode($output);
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WorkCenterCostModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'work_center_id' => $id,
                    'costtype' => $this->request->getVar('costtype'),
                    'costamount' => $this->request->getVar('costamount'),
                    'costuom' => $this->request->getVar('costuom'),
                    'notes2' => $this->request->getVar('notes2'),
                    'created_date'=>  date("Y-m-d H:i:s"),
                    'created_by' =>  user()->username,
                ];

                try {
                    $saved = $model->save($data);
                    if ($saved) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByWorkCenter($id),
                            'errors' => [],
                        ];
                    } else {
                        $output = [
                            'Success' => false,
                            'Counter' =>  9999,
                            'errors' => $model->errors(),
                        ];
                    }
                } catch (DatabaseException $e) {
                    $output = [
                        'Success' => false,
                        'Counter' =>  9999,
                        'errors' => ['Data already exists.'],
                    ];
                }
                
                return json_encode($output);
                //return redirect()->to(base_url('/work_center/edit/'.$id));

            } else  {
                $data = [
                    'work_center_id' => $work_center_id,
                    'costtype' => $this->request->getVar('costtype'),
                    'costamount' => $this->request->getVar('costamount'),
                    'costuom' => $this->request->getVar('costuom'),
                    'notes2' => $this->request->getVar('notes2'),
                    'updated_by' =>  user()->username,
                    'updated_at' =>  date("Y-m-d H:i:s"),
                ];
                
                try {
                    $updated = $model->updateData($id, $data);

                    if ($updated) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByWorkCenter($work_center_id),
                            'errors' => [],
                        ];
                    } else {
                        $output = [
                            'Success' => false,
                            'Counter' =>  9999,
                            'errors' => $model->errors(),
                        ];
                    }
                } catch (DatabaseException $e) {
                    $output = [
                        'Success' => false,
                        'Counter' =>  9999,
                        'errors' => ['Data already exists.'],
                    ];
                }

                return json_encode($output);
            }


        } else {
            
            //return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $output = [
                'Success' => false,
                'Counter' => 9999,
                'errors' => $this->validator->getErrors(),
            ];

            return json_encode($output);

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataWorkCenter = new WorkCenterModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);

        $data = [            
            'title' => 'Update WorkCenter',
            'title_child' => 'WorkCenter Machine',
            'title_child2' => 'WorkCenter Cost',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'work_center';
        $data['work_center'] = $dataWorkCenter->getWorkCenter($id);

        $dataSi = $dataSit->getSite($data['work_center'][0]->site)[0];
        $dataDe = $dataDep->getDepartment($data['work_center'][0]->dept)[0];

        $data['site_name'] = $data['work_center'][0]->site ? $dataSi->site_code."|".$dataSi->site_name : "|";
        $data['dept_name'] = $data['work_center'][0]->dept ? $dataDe->dept_code . "|". $dataDe->dept_name : "|";
        $data['warehouse_name'] = $data['work_center'][0]->warehouse ? $dataWhs->getWarehouse($data['work_center'][0]->warehouse)[0]->whs_code."|".$dataWhs->getWarehouse($data['work_center'][0]->warehouse)[0]->whs_name : "|";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'WorkCenter']);
        $data['page_title'] = view('partials/page-title', ['title' => 'WorkCenter', 'pagetitle' => 'MasterData']);

        return view('work_center/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getPost('id');
        $rules = [
            'site' => 'required',
            'dept' => 'required',
            'warehouse' => 'required',
            'workcenter' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WorkCenterModel($request);
            $data = [
                'site' => $this->request->getPost('site'),
                'dept' => $this->request->getPost('dept'),
                'warehouse' => $this->request->getPost('warehouse'),
                'workcenter' => $this->request->getPost('workcenter'),
                'description' => $this->request->getPost('description'),
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
        $id =  $this->request->getPost('id');
        $request = Services::request();
        $model = new WorkCenterModel($request);
        $active =  $this->request->getPost('active');
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

    public function deleteMachine()
    {
        $id =  $this->request->getPost('id');
        $work_center_id =  $this->request->getPost('work_center_id');
        $request = Services::request();
        $model = new WorkCenterMachineModel($request);
        $active =  $this->request->getPost('active');
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

        try {
            $deleted = $model->deleteData($id, $data);
            if ($deleted) {
                $output = [
                    'Success' => true,
                    'Counter' =>  $model->countAllByWorkCenter($id),
                    'errors' => [],
                ];
            } else {
                $output = [
                    'Success' => false,
                    'Counter' =>  9999,
                    'errors' => $model->errors(),
                ];
            }
        } catch (DatabaseException $e) {
            $output = [
                'Success' => false,
                'Counter' =>  9999,
                'errors' => ['Data already exists.'],
            ];
        }
        
        return json_encode($output);

    }

    public function deleteCost()
    {
        $id =  $this->request->getPost('id');
        $work_center_id =  $this->request->getPost('work_center_id');
        $request = Services::request();
        $model = new WorkCenterCostModel($request);
        $active =  $this->request->getPost('active');
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

        try {
            $deleted = $model->deleteData($id, $data);
            if ($deleted) {
                $output = [
                    'Success' => true,
                    'Counter' =>  $model->countAllByWorkCenter($id),
                    'errors' => [],
                ];
            } else {
                $output = [
                    'Success' => false,
                    'Counter' =>  9999,
                    'errors' => $model->errors(),
                ];
            }
            return json_encode($output);

        } catch (DatabaseException $e) {
            $output = [
                'Success' => false,
                'Counter' =>  9999,
                'errors' => ['Data already exists.'],
            ];
            return json_encode($output);
        }
        
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('work_center');   

        $query = $builder->like('work_center_desc', $this->request->getPost('q'))
                    ->select('id, work_center_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
        echo json_encode($data);
    }
}