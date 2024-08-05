<?php

namespace App\Controllers;

use App\Models\ProvincesModel;
use App\Models\CountriesModel;

use Config\Services;

class Provinces extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'provinces';

        $data['title'] = 'Provinces';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Provinces']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Provinces', 'pagetitle' => 'MasterData']);
        return view('provinces/index', $data);
	}

    public function getProvinces()  
    {

        $request = Services::request();
        $datatable = new ProvincesModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            $countriesModel = new CountriesModel($request);

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['province_name'] = $list->province_name;
                $row['province_code'] = $list->province_code;
                $row['country'] = $countriesModel->getCountries($list->country_id)[0]->country_name;
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

    public function ByCountry($id = null)
    {
        $request = Services::request();
        $model = new ProvincesModel($request);
        $data = $model->getByCountry($id);
        return json_encode($data);
    }

    public function getByCountry()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('provinces');   

        $query = $builder
                ->where('country_id', $this->request->getVar('country_id'))
                ->select('id, concat(province_code, "|", province_name) as text')
                ->limit(30)->get();

        if ($this->request->getVar('q')) {
            $query = $builder
                ->where('country_id', $this->request->getVar('country_id'))
                ->like('province_name', $this->request->getVar('q'))
                ->orLike('province_code', $this->request->getVar('q'))
                ->select('id, concat(province_code, "|", province_name) as text')
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
        $builder = $db->table('provinces');   

        $query = $builder
            ->select('id, concat(province_code, "|", province_name) as text')
            ->limit(30)->get();

        if ($this->request->getVar('q')) {
            $query = $builder
                ->like('province_name', $this->request->getVar('q'))
                ->orLike('province_code', $this->request->getVar('q'))
                ->select('id, concat(province_code, "|", province_name) as text')
                ->limit(30)->get();
        }
        
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function getCountry($id = null)
    {
        $request = Services::request();
        $model = new ProvincesModel($request);
        $data = $model->getCountry($id);
        return json_encode($data);
    }

    public function add()
    {        
        $data = [            
            'title' => 'Add Provinces',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'provinces';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Provinces']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Provinces', 'pagetitle' => 'MasterData']);

        return view('provinces/add', $data);            
    }

    public function save()
    {
        $rules = [
            'province_code'      => 'required|is_unique[provinces.province_code]|min_length[3]|max_length[12]',
            'province_name'      => 'required',
            'country_id'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ProvincesModel($request);
            $data = [
                'province_code' => $this->request->getVar('province_code'),
                'province_name' => $this->request->getVar('province_name'),
                'country_id' => $this->request->getVar('country_id'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/provinces/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataProvince = new ProvincesModel($request);
    
        $data = [            
            'title' => 'Update Provinces',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'provinces';
        $data['provinces'] = $dataProvince->getProvinces($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Provinces']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Provinces', 'pagetitle' => 'MasterData']);

        return view('provinces/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'province_code'      => 'required', //|is_unique[provinces.province_code,'.$id.']|min_length[3]|max_length[12]
            'province_name'      => 'required',
            'country_id'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ProvincesModel($request);
            $data = [
                'province_code' => $this->request->getVar('province_code'),
                'province_name' => $this->request->getVar('province_name'),
                'country_id' => $this->request->getVar('country_id'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/provinces/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $active =  $this->request->getVar('active');
        $request = Services::request();
        $model = new ProvincesModel($request);
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
        
        return redirect()->to(base_url('/provinces/index'));
    }
}