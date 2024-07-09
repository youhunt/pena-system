<?php

namespace App\Controllers;

use App\Models\LocationModel;
use App\Models\WarehouseModel;
use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\StatesModel;
use App\Models\CitiesModel;
use Config\Services;

class Location extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'loc';

        $data['title'] = 'Location';
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
                $row['comp_code'] = $list->comp_code;
                $row['site_code'] = $list->site_code;
                $row['dept_code'] = $list->dept_code;
                $row['whs_code'] = $list->whs_code;
                $row['loc_code'] = $list->loc_code;
                $row['loc_name'] = $list->loc_name;
                $row['loc_pic'] = $list->loc_pic;
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
        $request = Services::request();
        $dataCou = new CountriesModel($request);
        $dataCom = new CompanyModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        $dataWhs = new WarehouseModel($request);
    
        $data = [            
            'title' => 'Add Location',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'loc';
        $data['countries'] = $dataCou->findAll();
        $data['company'] = $dataCom->findAll();
        $data['sites'] = $dataSit->findAll();
        $data['departments'] = $dataDep->findAll();
        $data['warehouses'] = $dataWhs->findAll();

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
        $dataSta = new StatesModel($request);
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
        $data['states'] = $dataSta->getByCountry($data['loc'][0]->loc_count);
        $data['bstates'] = $dataSta->getByCountry($data['loc'][0]->whs_dcount);
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
        $model = new LocationModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/location/index'));
    }
}