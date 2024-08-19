<?php

namespace App\Controllers;

use App\Models\RoutingModel;
use App\Models\RoutingDetailModel;
use App\Models\UOMModel;
use App\Models\SiteModel;
use App\Models\DepartmentModel;
use App\Models\WarehouseModel;
use App\Models\ItemModel;
use App\Models\WorkCenterModel;
use Config\Services;

use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Routing extends BaseController
{

    public function index()
{
        $data['menu'] = 'item';
        $data['submenu'] = 'routing';

        $data['title'] = 'Routing';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Routing']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Routing', 'pagetitle' => 'MasterData']);
        return view('routing/index', $data);
}

    public function getRouting()  
    {

        $request = Services::request();
        $datatable = new RoutingModel($request);
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
                $row['itemcode'] = $list->itemcode;
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

    public function getRoutingDetail()  
    {

        $request = Services::request();
        $datatable = new RoutingDetailModel($request);
        $dataUOM = new UOMModel($request);
        $routing_id = $request->getPost('routing_id');

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatablesByRouting($routing_id);
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['no'] = $no;
                $row['routing_id'] = $list->routing_id;
                $row['routeno'] = $list->routeno;
                $row['workcenter'] = $list->workcenter;
                $row['routetype'] = $list->routetype;
                $row['hour'] = number_format((float)$list->hour, 5, '.', '');
                $row['houruom'] = $list->houruom;
                $row['houruom_desc'] = $list->houruom ?  $dataUOM->getUOM($list->houruom)[0]->uom_desc : "";
                $row['speed'] = number_format((float)$list->speed, 5, '.', '');
                $row['speeduom'] = $list->speeduom;
                $row['speeduom_desc'] = $list->speeduom ?  $dataUOM->getUOM($list->speeduom)[0]->uom_desc : "";
                $row['notes'] = $list->notes;
                $row['active'] = $list->active;
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAllByRouting($routing_id),
                'recordsFiltered' => $datatable->countFilteredByRouting($routing_id),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function getRoutingDetailById() {
        $request = Services::request();
        $dataBC = new RoutingDetailModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);
        $dataWC = new WorkCenterModel($request);
        $id =  $this->request->getPost('id');
        $lists = $dataBC->getRoutingDetail($id);
        $data = [];
        $no = $request->getPost('start');

        foreach ($lists as $list) {
            $row = [];
            $row['id'] = $list->id;
            $row['routing_id'] = $list->routing_id;
            $row['routeno'] = $list->routeno;
            $row['workcenter'] = $list->workcenter;
            $row['workcenter_desc'] = $list->workcenter ?  $dataWC->getWorkCenter($list->workcenter)[0]->workcenter."|".$dataWC->getWorkCenter($list->workcenter)[0]->description : "";
            $row['routetype'] = $list->routetype;
            $row['hour'] = $list->hour;
            $row['houruom'] = $list->houruom;
            $row['houruom_desc'] = $list->houruom ?  $dataUOM->getUOM($list->houruom)[0]->uom_code."|".$dataUOM->getUOM($list->houruom)[0]->uom_desc : "";
            $row['speed'] = $list->speed;
            $row['speeduom'] = $list->speeduom;
            $row['speeduom_desc'] = $list->speeduom ?  $dataUOM->getUOM($list->speeduom)[0]->uom_code."|".$dataUOM->getUOM($list->speeduom)[0]->uom_desc : "";
            $row['notes'] = $list->notes;
            $row['no'] = '';
            $row['active'] = $list->active;
            $data[] = $row;
        }
        echo json_encode($data);
    }

    public function add()
    {        
    
        $data = [            
            'title' => 'Add Routing',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'routing';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Routing']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Routing', 'pagetitle' => 'MasterData']);

        return view('routing/add', $data);            
    }

    public function save()
    {

        $rules = [
            'site' => 'required',
            'dept' => 'required',
            'itemcode' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new RoutingModel($request);
            $data = [
                'site' => $this->request->getPost('site'),
                'dept' => $this->request->getPost('dept'),
                'whs' => $this->request->getPost('whs'),
                'itemcode' => $this->request->getPost('itemcode'),
                'description' => $this->request->getPost('description'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];

            try
            {
                $model->save($data);
                $id = $model->getInsertID();
                return redirect()->to(base_url('/routing/edit/'.$id));
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

    public function saveDetail()
    {
        $id =  $this->request->getVar('id');
        $routing_id =  $this->request->getVar('routing_id');
        
        $rules = [
            'routing_id' => 'required',
            'routeno' => 'required',
            'workcenter' => 'required',
            'routetype' => 'required',
            'hour' => 'required',
            'houruom' => 'required',
            'speed' => 'required',
            'speeduom' => 'required',
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
            $model = new RoutingDetailModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'routing_id' => $id,
                    'routeno' => $this->request->getVar('routeno'),
                    'workcenter' => $this->request->getVar('workcenter'),
                    'routetype' => $this->request->getVar('routetype'),
                    'hour' => $this->request->getVar('hour'),
                    'houruom' => $this->request->getVar('houruom'),
                    'speed' => $this->request->getVar('speed'),
                    'speeduom' => $this->request->getVar('speeduom'),
                    'notes' => $this->request->getVar('notes'),
                    'created_date'=>  date("Y-m-d H:i:s"),
                    'created_by' =>  user()->username,
                ];

                try {
                    $saved = $model->save($data);
                    if ($saved) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByRouting($id),
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
                //return redirect()->to(base_url('/routing/edit/'.$id));

            } else  {
                $data = [
                    'routing_id' => $routing_id,
                    'routeno' => $this->request->getVar('routeno'),
                    'workcenter' => $this->request->getVar('workcenter'),
                    'routetype' => $this->request->getVar('routetype'),
                    'hour' => $this->request->getVar('hour'),
                    'houruom' => $this->request->getVar('houruom'),
                    'speed' => $this->request->getVar('speed'),
                    'speeduom' => $this->request->getVar('speeduom'),
                    'notes' => $this->request->getVar('notes'),
                    'updated_by' =>  user()->username,
                    'updated_at' =>  date("Y-m-d H:i:s"),
                ];
                
                try {
                    $updated = $model->updateData($id, $data);

                    if ($updated) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAllByRouting($routing_id),
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
        $dataRouting = new RoutingModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataItem = new ItemModel($request);

        $data = [            
            'title' => 'Update Routing',
            'title_child' => 'Routing Detail',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'routing';
        $data['routing'] = $dataRouting->getRouting($id);

        $dataSi = $dataSit->getSite($data['routing'][0]->site)[0];
        $dataDe = $dataDep->getDepartment($data['routing'][0]->dept)[0];

        $data['site_name'] = $data['routing'][0]->site ? $dataSi->site_code."|".$dataSi->site_name : "|";
        $data['dept_name'] = $data['routing'][0]->dept ? $dataDe->dept_code . "|". $dataDe->dept_name : "|";
        $data['whs_name'] = $data['routing'][0]->whs ? $dataWhs->getWarehouse($data['routing'][0]->whs)[0]->whs_code."|".$dataWhs->getWarehouse($data['routing'][0]->whs)[0]->whs_name : "|";
        $data['itemname'] = $data['routing'][0]->itemcode ? $dataItem->getItem($data['routing'][0]->itemcode)[0]->item_code."|".$dataItem->getItem($data['routing'][0]->itemcode)[0]->item_name_1 : "|";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Routing']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Routing', 'pagetitle' => 'MasterData']);

        return view('routing/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getPost('id');
        $rules = [
            'site' => 'required',
            'dept' => 'required',
            'itemcode' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new RoutingModel($request);
            $data = [
                'site' => $this->request->getPost('site'),
                'dept' => $this->request->getPost('dept'),
                'whs' => $this->request->getPost('whs'),
                'itemcode' => $this->request->getPost('itemcode'),
                'description' => $this->request->getPost('description'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            try
            {
                $model->updateData($id, $data);
                return redirect()->to(base_url('/routing/index'));
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
        $model = new RoutingModel($request);
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
        
        return redirect()->to(base_url('/routing/index'));
    }

    public function deleteDetail()
    {
        $id =  $this->request->getPost('id');
        $routing_id =  $this->request->getPost('routing_id');
        $request = Services::request();
        $model = new RoutingDetailModel($request);
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
                    'Counter' =>  $model->countAllByRouting($id),
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
        $routing_id =  $this->request->getPost('routing_id');
        $request = Services::request();
        $model = new RoutingCostModel($request);
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
                    'Counter' =>  $model->countAllByRouting($id),
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
        $builder = $db->table('routing');   

        $query = $builder->like('routing_desc', $this->request->getPost('q'))
                    ->select('id, routing_desc as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
        echo json_encode($data);
    }
}