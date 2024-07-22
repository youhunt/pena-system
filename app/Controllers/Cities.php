<?php

namespace App\Controllers;

use App\Models\CitiesModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;

use Config\Services;

class Cities extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'cities';

        $data['title'] = 'Cities';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Cities']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Cities', 'pagetitle' => 'MasterData']);
        return view('cities/index', $data);
	}

    public function getCities()  
    {

        $request = Services::request();
        $datatable = new CitiesModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            $countriesModel = new CountriesModel($request);
            $provincesModel = new ProvincesModel($request);

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['city_code'] = $list->city_code;
                $row['city_name'] = $list->city_name;
                $row['active'] = $list->active;
                $row['country'] = $countriesModel->getCountries($list->country_id)[0]->country_name;
                $row['province'] = $provincesModel->getProvinces($list->province_id)[0]->province_name;
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
        $model = new CitiesModel($request);
        $data = $model->getByCountry($id);
        return json_encode($data);
    }

    public function ByProvince($id = null)
    {
        $request = Services::request();
        $model = new CitiesModel($request);
        $data = $model->getByProvince($id);
        return json_encode($data);
    }

    public function getByCountryAndProvince()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('cities');   

        $query = $builder
                    ->where('province_id', $this->request->getVar('province_id'))
                    ->where('country_id', $this->request->getVar('country_id'))
                    ->like('city_name', $this->request->getVar('q'))
                    ->select('id, city_name as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function add()
    {        
        $data = [            
            'title' => 'Add Cities',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'cities';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Cities']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Cities', 'pagetitle' => 'MasterData']);

        return view('cities/add', $data);            
    }

    public function save()
    {
        $rules = [
            'city_code'      => 'required|is_unique[cities.city_code]|min_length[3]|max_length[12]',
            'city_name'      => 'required',
            'province_id'      => 'required',
            'country_id'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CitiesModel($request);
            $data = [
                'city_code' => $this->request->getVar('city_code'),
                'city_name' => $this->request->getVar('city_name'),
                'province_id' => $this->request->getVar('province_id'),
                'country_id' => $this->request->getVar('country_id'),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/cities/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCity = new CitiesModel($request);
    
        $data = [            
            'title' => 'Update Cities',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'cities';
        $data['cities'] = $dataCity->getCities($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Cities']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Cities', 'pagetitle' => 'MasterData']);

        return view('cities/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'city_code'      => 'required', //|is_unique[cities.city_code,'.$id.']|min_length[3]|max_length[12]
            'city_name'      => 'required',
            'province_id'      => 'required',
            'country_id'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new CitiesModel($request);
            $data = [
                'city_code' => $this->request->getVar('city_code'),
                'city_name' => $this->request->getVar('city_name'),
                'province_id' => $this->request->getVar('province_id'),
                'country_id' => $this->request->getVar('country_id'),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/cities/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $request = Services::request();
        $model = new CitiesModel($request);
        $id =  $this->request->getVar('id');
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
        
        return redirect()->to(base_url('/cities/index'));
    }
}