<?php

namespace App\Controllers;

use App\Models\CountriesModel;
use Config\Services;

class Countries extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'countries';

        $data['title'] = 'Countries';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Countries']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Countries', 'pagetitle' => 'MasterData']);
        return view('countries/index', $data);
	}

    public function getCountries()  
    {

        $request = Services::request();
        $datatable = new CountriesModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['name'] = $list->name;
                $row['region'] = $list->region;
                $row['subregion'] = $list->subregion;
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

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('countries');   

        $query = $builder->like('name', $this->request->getVar('q'))
                    ->select('id, name as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function getCountry($id = null)
    {
        $request = Services::request();
        $model = new CountriesModel($request);
        $data = $model->getCountry($id);
        return json_encode($data);
    }
}