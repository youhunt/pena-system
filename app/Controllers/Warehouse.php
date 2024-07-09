<?php

namespace App\Controllers;

use App\Models\WarehouseModel;
use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\StatesModel;
use App\Models\CitiesModel;
use Config\Services;

class Warehouse extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';

        $data['title'] = 'Warehouse';
        return view('warehouse/index', $data);
	}

    public function getWarehouse()  
    {

        $request = Services::request();
        $datatable = new WarehouseModel($request);
        
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
                $row['whs_name'] = $list->whs_name;
                $row['whs_pic'] = $list->whs_pic;
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
    
        $data = [            
            'title' => 'Add Warehouse',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';
        $data['countries'] = $dataCou->findAll();
        $data['company'] = $dataCom->findAll();
        $data['sites'] = $dataSit->findAll();
        $data['departments'] = $dataDep->findAll();

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
        $dataSta = new StatesModel($request);
        $dataCit = new CitiesModel($request);
        $dataDep = new DepartmentModel($request);
    
        $data = [            
            'title' => 'Update Warehouse',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';
        $data['whs'] = $dataWhs->getWarehouse($id);
        $data['sites'] = $dataSit->findAll();
        $data['company'] = $dataCom->findAll();
        $data['countries'] = $dataCou->findAll();
        $data['departments'] = $dataDep->findAll();
        $data['states'] = $dataSta->getByCountry($data['whs'][0]->whs_count);
        $data['bstates'] = $dataSta->getByCountry($data['whs'][0]->whs_bcount);
        $data['mstates'] = $dataSta->getByCountry($data['whs'][0]->whs_mcount);
        $data['cities'] = $dataCit->getByState($data['whs'][0]->whs_prov);
        $data['bcities'] = $dataCit->getByState($data['whs'][0]->whs_bprov);
        $data['mcities'] = $dataCit->getByState($data['whs'][0]->whs_mprov);

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
        $model->deleteData($id);
        
        return redirect()->to(base_url('/warehouse/index'));
    }
}