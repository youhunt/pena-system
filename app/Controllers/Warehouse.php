<?php

namespace App\Controllers;

use App\Models\WarehouseModel;
use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;
use App\Models\CitiesModel;
use Config\Services;

class Warehouse extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';

        $data['title'] = 'Warehouse';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Warehouse']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Warehouse', 'pagetitle' => 'MasterData']);
        return view('warehouse/index', $data);
	}

    public function getWarehouse()  
    {

        $request = Services::request();
        $datatable = new WarehouseModel($request);
        $dataCom = new CompanyModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['comp_code'] = $list->comp_code ? $dataCom->getCompany($list->comp_code)[0]->comp_name : "";
                $row['site_code'] = $list->site_code ? $dataSit->getSite($list->site_code)[0]->site_name : "";
                $row['dept_code'] = $list->dept_code ? $dataDep->getDepartment($list->dept_code)[0]->dept_name : "";
                $row['whs_code'] = $list->whs_code;
                $row['whs_name'] = $list->whs_name;
                $row['whs_pic'] = $list->whs_pic;
                $row['active'] = $list->active;
                $row['no'] = "";
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
            'title' => 'Add Warehouse',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Warehouse']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Warehouse', 'pagetitle' => 'MasterData']);
        
        return view('warehouse/add', $data);            
    }

    public function save()
    {
        $rules = [
            'dept_code'      => 'required',
            'comp_code'      => 'required',
            'site_code'      => 'required',
            'whs_code'      => 'required|is_unique[warehouse_master.whs_code]|min_length[3]|max_length[12]',
            'whs_name'      => 'required',
            'whs_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WarehouseModel($request);
            $data = [
                'dept_code' => $this->request->getVar('dept_code'),
                'site_code' => $this->request->getVar('site_code'),
                'comp_code' => $this->request->getVar('comp_code'),
                'whs_code' => $this->request->getVar('whs_code'),
                'whs_name' => $this->request->getVar('whs_name'),
                'whs_pic' => $this->request->getVar('whs_pic'),
                'whs_add' => $this->request->getVar('whs_add'),
                'whs_city' => $this->request->getVar('whs_city'),
                'whs_prov' => $this->request->getVar('whs_prov'),
                'whs_count' => $this->request->getVar('whs_count'),
                'whs_post' => $this->request->getVar('whs_post'),
                'whs_phone1' => $this->request->getVar('whs_phone1'),
                'whs_phone2' => $this->request->getVar('whs_phone2'),
                'whs_phone3' => $this->request->getVar('whs_phone3'),
                'whs_badd' => $this->request->getVar('whs_badd'),
                'whs_bcity' => $this->request->getVar('whs_bcity'),
                'whs_bprov' => $this->request->getVar('whs_bprov'),
                'whs_bcount' => $this->request->getVar('whs_bcount'),
                'whs_bpost' => $this->request->getVar('whs_bpost'),
                'whs_bphone1' => $this->request->getVar('whs_bphone1'),
                'whs_bphone2' => $this->request->getVar('whs_bphone2'),
                'whs_bphone3' => $this->request->getVar('whs_bphone3'),
                'whs_madd' => $this->request->getVar('whs_madd'),
                'whs_mcity' => $this->request->getVar('whs_mcity'),
                'whs_mprov' => $this->request->getVar('whs_mprov'),
                'whs_mcount' => $this->request->getVar('whs_mcount'),
                'whs_mpost' => $this->request->getVar('whs_mpost'),
                'whs_mphone1' => $this->request->getVar('whs_mphone1'),
                'whs_mphone2' => $this->request->getVar('whs_mphone2'),
                'whs_mphone3' => $this->request->getVar('whs_mphone3'),
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/warehouse/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCom = new CompanyModel($request);
        $dataWhs = new WarehouseModel($request);
        $dataSit = new SiteModel($request);
        $dataCou = new CountriesModel($request);
        $dataPro = new ProvincesModel($request);
        $dataCit = new CitiesModel($request);
        $dataDep = new DepartmentModel($request);
    
        $data = [            
            'title' => 'Update Warehouse',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';
        $data['whs'] = $dataWhs->getWarehouse($id);
        $data['dept_name'] = $data['whs'][0]->dept_code ? $dataDep->getDepartment($data['whs'][0]->dept_code)[0]->dept_name : "";
        $data['site_name'] = $data['whs'][0]->site_code ? $dataSit->getSite($data['whs'][0]->site_code)[0]->site_name : "";
        $data['comp_name'] = $data['whs'][0]->comp_code ? $dataCom->getCompany($data['whs'][0]->comp_code)[0]->comp_name : "";
        $data['count_name'] = $data['whs'][0]->whs_count ? $dataCou->getCountries($data['whs'][0]->whs_count)[0]->country_name : "";
        $data['bcount_name'] = $data['whs'][0]->whs_bcount ? $dataCou->getCountries($data['whs'][0]->whs_bcount)[0]->country_name : "";
        $data['mcount_name'] = $data['whs'][0]->whs_mcount ? $dataCou->getCountries($data['whs'][0]->whs_mcount)[0]->country_name : "";
        $data['prov_name'] = $data['whs'][0]->whs_prov ? $dataPro->getProvinces($data['whs'][0]->whs_prov)[0]->province_name : "";
        $data['bprov_name'] = $data['whs'][0]->whs_bprov ? $dataPro->getProvinces($data['whs'][0]->whs_bprov)[0]->province_name : "";
        $data['mprov_name'] = $data['whs'][0]->whs_mprov ? $dataPro->getProvinces($data['whs'][0]->whs_mprov)[0]->province_name : "";
        $data['city_name'] = $data['whs'][0]->whs_city ? $dataCit->getCities($data['whs'][0]->whs_city)[0]->city_name : "";
        $data['bcity_name'] = $data['whs'][0]->whs_bcity ? $dataCit->getCities($data['whs'][0]->whs_bcity)[0]->city_name : "";
        $data['mcity_name'] = $data['whs'][0]->whs_mcity ? $dataCit->getCities($data['whs'][0]->whs_mcity)[0]->city_name : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Warehouse']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Warehouse', 'pagetitle' => 'MasterData']);
        
        return view('warehouse/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'dept_code'      => 'required',
            'site_code'      => 'required',
            'comp_code'      => 'required',
            'whs_code'      => 'required|is_unique[warehouse_master.whs_code,id,'.$id.']|min_length[3]|max_length[12]',
            'whs_name'      => 'required',
            'whs_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new WarehouseModel($request);
            $data = [
                'dept_code' => $this->request->getVar('dept_code'),
                'comp_code' => $this->request->getVar('comp_code'),
                'site_code' => $this->request->getVar('site_code'),
                'whs_code' => $this->request->getVar('whs_code'),
                'whs_name' => $this->request->getVar('whs_name'),
                'whs_pic' => $this->request->getVar('whs_pic'),
                'whs_add' => $this->request->getVar('whs_add'),
                'whs_city' => $this->request->getVar('whs_city'),
                'whs_prov' => $this->request->getVar('whs_prov'),
                'whs_count' => $this->request->getVar('whs_count'),
                'whs_post' => $this->request->getVar('whs_post'),
                'whs_phone1' => $this->request->getVar('whs_phone1'),
                'whs_phone2' => $this->request->getVar('whs_phone2'),
                'whs_phone3' => $this->request->getVar('whs_phone3'),
                'whs_badd' => $this->request->getVar('whs_badd'),
                'whs_bcity' => $this->request->getVar('whs_bcity'),
                'whs_bprov' => $this->request->getVar('whs_bprov'),
                'whs_bcount' => $this->request->getVar('whs_bcount'),
                'whs_bpost' => $this->request->getVar('whs_bpost'),
                'whs_bphone1' => $this->request->getVar('whs_bphone1'),
                'whs_bphone2' => $this->request->getVar('whs_bphone2'),
                'whs_bphone3' => $this->request->getVar('whs_bphone3'),
                'whs_madd' => $this->request->getVar('whs_madd'),
                'whs_mcity' => $this->request->getVar('whs_mcity'),
                'whs_mprov' => $this->request->getVar('whs_mprov'),
                'whs_mcount' => $this->request->getVar('whs_mcount'),
                'whs_mpost' => $this->request->getVar('whs_mpost'),
                'whs_mphone1' => $this->request->getVar('whs_mphone1'),
                'whs_mphone2' => $this->request->getVar('whs_mphone2'),
                'whs_mphone3' => $this->request->getVar('whs_mphone3'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/warehouse/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new WarehouseModel($request);
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
        
        return redirect()->to(base_url('/warehouse/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('warehouse_master');   

        $query = $builder->like('whs_name', $this->request->getVar('q'))
                    ->select('whs_code as id, whs_name as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function getByDepartment()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('warehouse_master');   

        $query = $builder
                    ->where('dept_code', $this->request->getVar('dept_id'))
                    ->like('whs_name', $this->request->getVar('q'))
                    ->select('id, whs_name as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}