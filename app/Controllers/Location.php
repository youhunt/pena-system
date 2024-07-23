<?php

namespace App\Controllers;

use App\Models\LocationModel;
use App\Models\WarehouseModel;
use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;
use App\Models\CitiesModel;
use Config\Services;

class Location extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'loc';

        $data['title'] = 'Location';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Location']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Location', 'pagetitle' => 'MasterData']);
        return view('location/index', $data);
	}

    public function getLocation()  
    {

        $request = Services::request();
        $datatable = new LocationModel($request);
        
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
                $row['loc_code'] = $list->loc_code;
                $row['loc_name'] = $list->loc_name;
                $row['loc_pic'] = $list->loc_pic;
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
            'title' => 'Add Location',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'loc';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Location']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Location', 'pagetitle' => 'MasterData']);

        return view('location/add', $data);            
    }

    public function save()
    {
        $rules = [
            'dept_code'      => 'required',
            'comp_code'      => 'required',
            'site_code'      => 'required',
            'whs_code'      => 'required',
            'loc_code'      => 'required|is_unique[location_master.loc_code]|min_length[3]|max_length[12]',
            'loc_name'      => 'required',
            'loc_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new LocationModel($request);
            $data = [
                'dept_code' => $this->request->getVar('dept_code'),
                'site_code' => $this->request->getVar('site_code'),
                'comp_code' => $this->request->getVar('comp_code'),
                'whs_code' => $this->request->getVar('whs_code'),
                'loc_code' => $this->request->getVar('loc_code'),
                'loc_name' => $this->request->getVar('loc_name'),
                'loc_pic' => $this->request->getVar('loc_pic'),
                'loc_add' => $this->request->getVar('loc_add'),
                'loc_city' => $this->request->getVar('loc_city'),
                'loc_prov' => $this->request->getVar('loc_prov'),
                'loc_count' => $this->request->getVar('loc_count'),
                'loc_post' => $this->request->getVar('loc_post'),
                'loc_phone1' => $this->request->getVar('loc_phone1'),
                'loc_phone2' => $this->request->getVar('loc_phone2'),
                'loc_phone3' => $this->request->getVar('loc_phone3'),
                'whs_dadd' => $this->request->getVar('whs_dadd'),
                'whs_dcity' => $this->request->getVar('whs_dcity'),
                'whs_dprov' => $this->request->getVar('whs_dprov'),
                'whs_dcount' => $this->request->getVar('whs_dcount'),
                'whs_dpost' => $this->request->getVar('whs_dpost'),
                'whs_dphone1' => $this->request->getVar('whs_dphone1'),
                'whs_dphone2' => $this->request->getVar('whs_dphone2'),
                'whs_dphone3' => $this->request->getVar('whs_dphone3'),
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/location/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCom = new CompanyModel($request);
        $dataLoc = new LocationModel($request);
        $dataSit = new SiteModel($request);
        $dataCou = new CountriesModel($request);
        $dataSta = new ProvincesModel($request);
        $dataCit = new CitiesModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
    
        $data = [            
            'title' => 'Update Location',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'loc';
        $data['loc'] = $dataLoc->getLocation($id);
        $data['sites'] = $dataSit->findAll();
        $data['company'] = $dataCom->findAll();
        $data['countries'] = $dataCou->findAll();
        $data['departments'] = $dataDep->findAll();
        $data['warehouses'] = $dataWhs->findAll();
        $data['provinces'] = $dataSta->getByCountry($data['loc'][0]->loc_count);
        $data['bprovinces'] = $dataSta->getByCountry($data['loc'][0]->whs_dcount);
        $data['cities'] = $dataCit->getByState($data['loc'][0]->loc_prov);
        $data['bcities'] = $dataCit->getByState($data['loc'][0]->whs_dprov);

        return view('location/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'dept_code'      => 'required',
            'site_code'      => 'required',
            'comp_code'      => 'required',
            'whs_code'      => 'required',
            'loc_code'      => 'required|is_unique[location_master.loc_code,id,'.$id.']|min_length[3]|max_length[12]',
            'loc_name'      => 'required',
            'loc_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new LocationModel($request);
            $data = [
                'dept_code' => $this->request->getVar('dept_code'),
                'comp_code' => $this->request->getVar('comp_code'),
                'site_code' => $this->request->getVar('site_code'),
                'whs_code' => $this->request->getVar('whs_code'),
                'loc_code' => $this->request->getVar('loc_code'),
                'loc_name' => $this->request->getVar('loc_name'),
                'loc_pic' => $this->request->getVar('loc_pic'),
                'loc_add' => $this->request->getVar('loc_add'),
                'loc_city' => $this->request->getVar('loc_city'),
                'loc_prov' => $this->request->getVar('loc_prov'),
                'loc_count' => $this->request->getVar('loc_count'),
                'loc_post' => $this->request->getVar('loc_post'),
                'loc_phone1' => $this->request->getVar('loc_phone1'),
                'loc_phone2' => $this->request->getVar('loc_phone2'),
                'loc_phone3' => $this->request->getVar('loc_phone3'),
                'whs_dadd' => $this->request->getVar('whs_dadd'),
                'whs_dcity' => $this->request->getVar('whs_dcity'),
                'whs_dprov' => $this->request->getVar('whs_dprov'),
                'whs_dcount' => $this->request->getVar('whs_dcount'),
                'whs_dpost' => $this->request->getVar('whs_dpost'),
                'whs_dphone1' => $this->request->getVar('whs_dphone1'),
                'whs_dphone2' => $this->request->getVar('whs_dphone2'),
                'whs_dphone3' => $this->request->getVar('whs_dphone3'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/location/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
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
        
        return redirect()->to(base_url('/location/index'));
    }
}