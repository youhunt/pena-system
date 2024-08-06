<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;
use App\Models\CitiesModel;
use Config\Services;

class Department extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';

        $data['title'] = 'Department';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Department']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Department', 'pagetitle' => 'MasterData']);
        return view('department/index', $data);
	}

    public function getDepartment()  
    {

        $request = Services::request();
        $datatable = new DepartmentModel($request);
        $dataCom = new CompanyModel($request);
        $dataSit = new SiteModel($request);

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
                $row['dept_code'] = $list->dept_code;
                $row['dept_name'] = $list->dept_name;
                $row['dept_pic'] = $list->dept_pic;
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

    public function getBySite()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('department_master');   

        $query = $builder
            ->where('site_code', $this->request->getVar('site_id'))
            ->select('id, concat(dept_code, "|", dept_name) as text')
            ->limit(30)->get();
            
        if ($this->request->getVar('q')) {
            $query = $builder
                ->where('site_code', $this->request->getVar('site_id'))
                ->like('dept_name', $this->request->getVar('q'))
                ->orLike('dept_code', $this->request->getVar('q'))
                ->select('id, concat(dept_code, "|", dept_name) as text')
                ->limit(30)->get();
        }

        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('department_master');   

        $query = $builder
            ->select('id, concat(dept_code, "|", dept_name) as text')
            ->limit(30)->get();

        if ($this->request->getVar('q')) {
            $query = $builder
                ->like('dept_name', $this->request->getVar('q'))
                ->orLike('dept_code', $this->request->getVar('q'))
                ->select('id, concat(dept_code, "|", dept_name) as text')
                ->limit(30)->get();
        }

        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function add()
    {        
        $data = [            
            'title' => 'Add Department',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Department']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Department', 'pagetitle' => 'MasterData']);

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
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
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
        $dataPro = new ProvincesModel($request);
        $dataCit = new CitiesModel($request);
    
        $data = [            
            'title' => 'Update Department',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'dept';
        $data['dept'] = $dataDep->getDepartment($id);
        $data['site_name'] = $data['dept'][0]->site_code ? $dataSit->getSite($data['dept'][0]->site_code)[0]->site_code."|".$dataSit->getSite($data['dept'][0]->site_code)[0]->site_name : "";
        $data['comp_name'] = $data['dept'][0]->comp_code ? $dataCom->getCompany($data['dept'][0]->comp_code)[0]->comp_code."|".$dataCom->getCompany($data['dept'][0]->comp_code)[0]->comp_name : "";
        $data['count_name'] = $data['dept'][0]->dept_count ? $dataCou->getCountries($data['dept'][0]->dept_count)[0]->country_code."|".$dataCou->getCountries($data['dept'][0]->dept_count)[0]->country_name : "";
        $data['bcount_name'] = $data['dept'][0]->dept_bcount ? $dataCou->getCountries($data['dept'][0]->dept_bcount)[0]->country_code."|".$dataCou->getCountries($data['dept'][0]->dept_bcount)[0]->country_name : "";
        $data['mcount_name'] = $data['dept'][0]->dept_mcount ? $dataCou->getCountries($data['dept'][0]->dept_mcount)[0]->country_code."|".$dataCou->getCountries($data['dept'][0]->dept_mcount)[0]->country_name : "";
        $data['prov_name'] = $data['dept'][0]->dept_prov ? $dataPro->getProvinces($data['dept'][0]->dept_prov)[0]->province_code."|".$dataPro->getProvinces($data['dept'][0]->dept_prov)[0]->province_name : "";
        $data['bprov_name'] = $data['dept'][0]->dept_bprov ? $dataPro->getProvinces($data['dept'][0]->dept_bprov)[0]->province_code."|".$dataPro->getProvinces($data['dept'][0]->dept_bprov)[0]->province_name : "";
        $data['mprov_name'] = $data['dept'][0]->dept_mprov ? $dataPro->getProvinces($data['dept'][0]->dept_mprov)[0]->province_code."|".$dataPro->getProvinces($data['dept'][0]->dept_mprov)[0]->province_name : "";
        $data['city_name'] = $data['dept'][0]->dept_city ? $dataCit->getCities($data['dept'][0]->dept_city)[0]->city_code."|".$dataCit->getCities($data['dept'][0]->dept_city)[0]->city_name : "";
        $data['bcity_name'] = $data['dept'][0]->dept_bcity ? $dataCit->getCities($data['dept'][0]->dept_bcity)[0]->city_code."|".$dataCit->getCities($data['dept'][0]->dept_bcity)[0]->city_name : "";
        $data['mcity_name'] = $data['dept'][0]->dept_mcity ? $dataCit->getCities($data['dept'][0]->dept_mcity)[0]->city_code."|".$dataCit->getCities($data['dept'][0]->dept_mcity)[0]->city_name : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Department']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Department', 'pagetitle' => 'MasterData']);

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
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
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
        
        return redirect()->to(base_url('/department/index'));
    }
}