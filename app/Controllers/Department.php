<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\StatesModel;
use App\Models\CitiesModel;
use Config\Services;

class Department extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';

        $data['title'] = 'Department';
        return view('department/index', $data);
	}

    public function getDepartment()  
    {

        $request = Services::request();
        $datatable = new DepartmentModel($request);
        
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
                $row['dept_name'] = $list->dept_name;
                $row['dept_pic'] = $list->dept_pic;
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
    
        $data = [            
            'title' => 'Add Department',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';
        $data['countries'] = $dataCou->findAll();
        $data['company'] = $dataCom->findAll();
        $data['sites'] = $dataSit->findAll();

        return view('department/add', $data);            
    }

    public function save()
    {
        $rules = [
            'comp_code'      => 'required',
            'site_code'      => 'required',
            'dept_code'      => 'required|is_unique[department_master.dept_code]|min_length[3]|max_length[12]',
            'dept_name'      => 'required',
            'dept_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new DepartmentModel($request);
            $data = [
                'comp_code' => $this->request->getVar('comp_code'),
                'site_code' => $this->request->getVar('site_code'),
                'dept_code' => $this->request->getVar('dept_code'),
                'dept_name' => $this->request->getVar('dept_name'),
                'dept_pic' => $this->request->getVar('dept_pic'),
                'dept_add' => $this->request->getVar('dept_add'),
                'dept_city' => $this->request->getVar('dept_city'),
                'dept_prov' => $this->request->getVar('dept_prov'),
                'dept_count' => $this->request->getVar('dept_count'),
                'dept_post' => $this->request->getVar('dept_post'),
                'dept_phone1' => $this->request->getVar('dept_phone1'),
                'dept_phone2' => $this->request->getVar('dept_phone2'),
                'dept_phone3' => $this->request->getVar('dept_phone3'),
                'dept_badd' => $this->request->getVar('dept_badd'),
                'dept_bcity' => $this->request->getVar('dept_bcity'),
                'dept_bprov' => $this->request->getVar('dept_bprov'),
                'dept_bcount' => $this->request->getVar('dept_bcount'),
                'dept_bpost' => $this->request->getVar('dept_bpost'),
                'dept_bphone1' => $this->request->getVar('dept_bphone1'),
                'dept_bphone2' => $this->request->getVar('dept_bphone2'),
                'dept_bphone3' => $this->request->getVar('dept_bphone3'),
                'dept_madd' => $this->request->getVar('dept_madd'),
                'dept_mcity' => $this->request->getVar('dept_mcity'),
                'dept_mprov' => $this->request->getVar('dept_mprov'),
                'dept_mcount' => $this->request->getVar('dept_mcount'),
                'dept_mpost' => $this->request->getVar('dept_mpost'),
                'dept_mphone1' => $this->request->getVar('dept_mphone1'),
                'dept_mphone2' => $this->request->getVar('dept_mphone2'),
                'dept_mphone3' => $this->request->getVar('dept_mphone3'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/department/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCom = new CompanyModel($request);
        $dataDep = new DepartmentModel($request);
        $dataSit = new SiteModel($request);
        $dataCou = new CountriesModel($request);
        $dataSta = new StatesModel($request);
        $dataCit = new CitiesModel($request);
    
        $data = [            
            'title' => 'Update Department',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';
        $data['dept'] = $dataDep->getDepartment($id);
        $data['company'] = $dataCom->findAll();
        $data['countries'] = $dataCou->findAll();
        $data['sites'] = $dataSit->findAll();
        $data['states'] = $dataSta->getByCountry($data['dept'][0]->dept_count);
        $data['bstates'] = $dataSta->getByCountry($data['dept'][0]->dept_bcount);
        $data['mstates'] = $dataSta->getByCountry($data['dept'][0]->dept_mcount);
        $data['cities'] = $dataCit->getByState($data['dept'][0]->dept_prov);
        $data['bcities'] = $dataCit->getByState($data['dept'][0]->dept_bprov);
        $data['mcities'] = $dataCit->getByState($data['dept'][0]->dept_mprov);

        return view('department/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'site_code'      => 'required',
            'comp_code'      => 'required',
            'dept_code'      => 'required|is_unique[department_master.dept_code,id,'.$id.']|min_length[3]|max_length[12]',
            'dept_name'      => 'required',
            'dept_pic'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new DepartmentModel($request);
            $data = [
                'site_code' => $this->request->getVar('site_code'),
                'comp_code' => $this->request->getVar('comp_code'),
                'dept_code' => $this->request->getVar('dept_code'),
                'dept_name' => $this->request->getVar('dept_name'),
                'dept_pic' => $this->request->getVar('dept_pic'),
                'dept_add' => $this->request->getVar('dept_add'),
                'dept_city' => $this->request->getVar('dept_city'),
                'dept_prov' => $this->request->getVar('dept_prov'),
                'dept_count' => $this->request->getVar('dept_count'),
                'dept_post' => $this->request->getVar('dept_post'),
                'dept_phone1' => $this->request->getVar('dept_phone1'),
                'dept_phone2' => $this->request->getVar('dept_phone2'),
                'dept_phone3' => $this->request->getVar('dept_phone3'),
                'dept_badd' => $this->request->getVar('dept_badd'),
                'dept_bcity' => $this->request->getVar('dept_bcity'),
                'dept_bprov' => $this->request->getVar('dept_bprov'),
                'dept_bcount' => $this->request->getVar('dept_bcount'),
                'dept_bpost' => $this->request->getVar('dept_bpost'),
                'dept_bphone1' => $this->request->getVar('dept_bphone1'),
                'dept_bphone2' => $this->request->getVar('dept_bphone2'),
                'dept_bphone3' => $this->request->getVar('dept_bphone3'),
                'dept_madd' => $this->request->getVar('dept_madd'),
                'dept_mcity' => $this->request->getVar('dept_mcity'),
                'dept_mprov' => $this->request->getVar('dept_mprov'),
                'dept_mcount' => $this->request->getVar('dept_mcount'),
                'dept_mpost' => $this->request->getVar('dept_mpost'),
                'dept_mphone1' => $this->request->getVar('dept_mphone1'),
                'dept_mphone2' => $this->request->getVar('dept_mphone2'),
                'dept_mphone3' => $this->request->getVar('dept_mphone3'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/department/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new DepartmentModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/department/index'));
    }
}