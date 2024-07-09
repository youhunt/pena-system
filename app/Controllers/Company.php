<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\CountriesModel;
use App\Models\StatesModel;
use App\Models\CitiesModel;
use Config\Services;

class Company extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'company';

        $data['title'] = 'Company';
        return view('company/index', $data);
	}

    public function getCompany()  
    {

        $request = Services::request();
        $datatable = new CompanyModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['comp_code'] = $list->comp_code;
                $row['comp_name'] = $list->comp_name;
                $row['comp_pic'] = $list->comp_pic;
                $row['comp_taxid'] = $list->comp_taxid;
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
    
        $data = [            
            'title' => 'Add Company',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'company';
        $data['countries'] = $dataCou->findAll();

        return view('company/add', $data);            
    }

    public function save()
    {
        $rules = [
            'comp_code'      => 'required|is_unique[company_master.comp_code]|min_length[3]|max_length[12]',
            'comp_name'      => 'required',
            'comp_pic'      => 'required',
            'comp_taxid'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CompanyModel($request);
            $data = [
                'comp_code' => $this->request->getVar('comp_code'),
                'comp_name' => $this->request->getVar('comp_name'),
                'comp_taxid' => $this->request->getVar('comp_taxid'),
                'comp_pic' => $this->request->getVar('comp_pic'),
                'comp_add' => $this->request->getVar('comp_add'),
                'comp_city' => $this->request->getVar('comp_city'),
                'comp_prov' => $this->request->getVar('comp_prov'),
                'comp_count' => $this->request->getVar('comp_count'),
                'comp_post' => $this->request->getVar('comp_post'),
                'comp_phone1' => $this->request->getVar('comp_phone1'),
                'comp_phone2' => $this->request->getVar('comp_phone2'),
                'comp_phone3' => $this->request->getVar('comp_phone3'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/company/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataComp = new CompanyModel($request);
        $dataCou = new CountriesModel($request);
        $dataSta = new StatesModel($request);
        $dataCit = new CitiesModel($request);
    
        $data = [            
            'title' => 'Update Company',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'company';
        $data['company'] = $dataComp->getCompany($id);
        $data['countries'] = $dataCou->findAll();
        $data['states'] = $dataSta->getByCountry($data['company'][0]->comp_count);
        $data['cities'] = $dataCit->getByCountry($data['company'][0]->comp_count);

        return view('company/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'comp_code'      => 'required|is_unique[company_master.comp_code,id,'.$id.']|min_length[3]|max_length[12]',
            'comp_name'      => 'required',
            'comp_pic'      => 'required',
            'comp_taxid'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CompanyModel($request);
            $data = [
                'comp_code' => $this->request->getVar('comp_code'),
                'comp_name' => $this->request->getVar('comp_name'),
                'comp_taxid' => $this->request->getVar('comp_taxid'),
                'comp_pic' => $this->request->getVar('comp_pic'),
                'comp_add' => $this->request->getVar('comp_add'),
                'comp_city' => $this->request->getVar('comp_city'),
                'comp_prov' => $this->request->getVar('comp_prov'),
                'comp_count' => $this->request->getVar('comp_count'),
                'comp_post' => $this->request->getVar('comp_post'),
                'comp_phone1' => $this->request->getVar('comp_phone1'),
                'comp_phone2' => $this->request->getVar('comp_phone2'),
                'comp_phone3' => $this->request->getVar('comp_phone3'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/company/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new CompanyModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/company/index'));
    }
}