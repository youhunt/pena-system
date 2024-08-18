<?php

namespace App\Controllers;

use App\Models\RoutingModel;
use App\Models\RoutingDetailModel;
use App\Models\UOMModel;
use App\Models\SiteModel;
use App\Models\DepartmentModel;
use App\Models\WarehouseModel;
use App\Models\ItemModel;
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
                $row['warehouse'] = $list->warehouse ? $dataWhs->getWarehouse($list->warehouse)[0]->whs_name : "";
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
                $row['routing_id'] = $list->routing_id;
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
                'recordsTotal' => $datatable->countAllByRouting($routing_id),
                'recordsFiltered' => $datatable->countFilteredByRouting($routing_id),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function getRoutingCost()  
    {

        $request = Services::request();
        $datatable = new RoutingCostModel($request);
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
                $row['routing_id'] = $list->routing_id;
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
        $id =  $this->request->getPost('id');
        $lists = $dataBC->getRoutingDetail($id);
        $data = [];
        $no = $request->getPost('start');

        foreach ($lists as $list) {
            $row = [];
            $row['id'] = $list->id;
            $row['routing_id'] = $list->routing_id;
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
            'warehouse' => 'required',
            'workcenter' => 'required',
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
            $model = new RoutingDetailModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'routing_id' => $id,
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

    public function saveCost()
    {
        $id =  $this->request->getVar('id');
        $routing_id =  $this->request->getVar('routing_id');
        
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
            $model = new RoutingCostModel($request);
            $status = $this->request->getVar('status');
            if($status=="1") {
                $data = [
                    'routing_id' => $id,
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

        $data = [            
            'title' => 'Update Routing',
            'title_child' => 'Routing Detail',
            'title_child2' => 'Routing Cost',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'routing';
        $data['routing'] = $dataRouting->getRouting($id);

        $dataSi = $dataSit->getSite($data['routing'][0]->site)[0];
        $dataDe = $dataDep->getDepartment($data['routing'][0]->dept)[0];

        $data['site_name'] = $data['routing'][0]->site ? $dataSi->site_code."|".$dataSi->site_name : "|";
        $data['dept_name'] = $data['routing'][0]->dept ? $dataDe->dept_code . "|". $dataDe->dept_name : "|";
        $data['warehouse_name'] = $data['routing'][0]->warehouse ? $dataWhs->getWarehouse($data['routing'][0]->warehouse)[0]->whs_code."|".$dataWhs->getWarehouse($data['routing'][0]->warehouse)[0]->whs_name : "|";
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
            'warehouse' => 'required',
            'workcenter' => 'required',
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
                'warehouse' => $this->request->getPost('warehouse'),
                'workcenter' => $this->request->getPost('workcenter'),
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