<?php

namespace App\Controllers;

use App\Models\StatesModel;
use App\Models\CountriesModel;

use Config\Services;

class States extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'states';

        $data['title'] = 'States';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'States']);
        $data['page_title'] = view('partials/page-title', ['title' => 'States', 'pagetitle' => 'MasterData']);
        return view('states/index', $data);
	}

    public function getStates()  
    {

        $request = Services::request();
        $datatable = new StatesModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            $countriesModel = new CountriesModel($request);

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['name'] = $list->name;
                $row['country'] = $countriesModel->getCountry($list->country_id)[0]->name;
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
        $model = new StatesModel($request);
        $data = $model->getByCountry($id);
        return json_encode($data);
    }
}