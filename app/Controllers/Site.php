<?php

namespace App\Controllers;

use App\Models\SiteModel;
use App\Models\CompanyModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;
use App\Models\CitiesModel;
use Config\Services;

class Site extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'site';

        $data['title'] = 'Site';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Site']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Site', 'pagetitle' => 'MasterData']);
        return view('site/index', $data);
	}

    public function getSite()  
    {

        $request = Services::request();
        $datatable = new SiteModel($request);
        $dataComp = new CompanyModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['comp_code'] = $dataComp->getCompany($list->comp_code)[0]->comp_name;
                $row['site_code'] = $list->site_code;
                $row['site_name'] = $list->site_name;
                $row['site_pic'] = $list->site_pic;
                $row['site_taxid'] = $list->site_taxid;
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
        $request = Services::request();
    
        $data = [            
            'title' => 'Add Site',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'site';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Site']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Site', 'pagetitle' => 'MasterData']);

        return view('site/add', $data);            
    }

    public function save()
    {
        $rules = [
            'comp_code'      => 'required',
            'site_code'      => 'required|is_unique[site_master.site_code]|min_length[3]|max_length[12]',
            'site_name'      => 'required',
            'site_pic'      => 'required',
            'site_taxid'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new SiteModel($request);
            $data = [
                'comp_code' => $this->request->getVar('comp_code'),
                'site_code' => $this->request->getVar('site_code'),
                'site_name' => $this->request->getVar('site_name'),
                'site_taxid' => $this->request->getVar('site_taxid'),
                'site_pic' => $this->request->getVar('site_pic'),
                'site_add' => $this->request->getVar('site_add'),
                'site_city' => $this->request->getVar('site_city'),
                'site_prov' => $this->request->getVar('site_prov'),
                'site_count' => $this->request->getVar('site_count'),
                'site_post' => $this->request->getVar('site_post'),
                'site_phone1' => $this->request->getVar('site_phone1'),
                'site_phone2' => $this->request->getVar('site_phone2'),
                'site_phone3' => $this->request->getVar('site_phone3'),
                'site_badd' => $this->request->getVar('site_badd'),
                'site_bcity' => $this->request->getVar('site_bcity'),
                'site_bprov' => $this->request->getVar('site_bprov'),
                'site_bcount' => $this->request->getVar('site_bcount'),
                'site_bpost' => $this->request->getVar('site_bpost'),
                'site_bphone1' => $this->request->getVar('site_bphone1'),
                'site_bphone2' => $this->request->getVar('site_bphone2'),
                'site_bphone3' => $this->request->getVar('site_bphone3'),
                'site_madd' => $this->request->getVar('site_madd'),
                'site_mcity' => $this->request->getVar('site_mcity'),
                'site_mprov' => $this->request->getVar('site_mprov'),
                'site_mcount' => $this->request->getVar('site_mcount'),
                'site_mpost' => $this->request->getVar('site_mpost'),
                'site_mphone1' => $this->request->getVar('site_mphone1'),
                'site_mphone2' => $this->request->getVar('site_mphone2'),
                'site_mphone3' => $this->request->getVar('site_mphone3'),
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/site/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        //$dataCom = new CompanyModel($request);
        $dataSit = new SiteModel($request);
        // $dataCou = new CountriesModel($request);
        // $dataSta = new ProvincesModel($request);
        // $dataCit = new CitiesModel($request);
    
        $data = [            
            'title' => 'Update Site',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'site';
        $data['site'] = $dataSit->getSite($id);
        // $data['company'] = $dataCom->findAll();
        // $data['countries'] = $dataCou->findAll();
        // $data['provinces'] = $dataSta->getByCountry($data['site'][0]->site_count);
        // $data['bprovinces'] = $dataSta->getByCountry($data['site'][0]->site_bcount);
        // $data['mprovinces'] = $dataSta->getByCountry($data['site'][0]->site_mcount);
        // $data['cities'] = $dataCit->getByProvince($data['site'][0]->site_prov);
        // $data['bcities'] = $dataCit->getByProvince($data['site'][0]->site_bprov);
        // $data['mcities'] = $dataCit->getByProvince($data['site'][0]->site_mprov);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Site']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Site', 'pagetitle' => 'MasterData']);

        return view('site/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'comp_code'      => 'required',
            'site_code'      => 'required|is_unique[site_master.site_code,id,'.$id.']|min_length[3]|max_length[12]',
            'site_name'      => 'required',
            'site_pic'      => 'required',
            'site_taxid'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new SiteModel($request);
            $data = [
                'comp_code' => $this->request->getVar('comp_code'),
                'site_code' => $this->request->getVar('site_code'),
                'site_name' => $this->request->getVar('site_name'),
                'site_taxid' => $this->request->getVar('site_taxid'),
                'site_pic' => $this->request->getVar('site_pic'),
                'site_add' => $this->request->getVar('site_add'),
                'site_city' => $this->request->getVar('site_city'),
                'site_prov' => $this->request->getVar('site_prov'),
                'site_count' => $this->request->getVar('site_count'),
                'site_post' => $this->request->getVar('site_post'),
                'site_phone1' => $this->request->getVar('site_phone1'),
                'site_phone2' => $this->request->getVar('site_phone2'),
                'site_phone3' => $this->request->getVar('site_phone3'),
                'site_badd' => $this->request->getVar('site_badd'),
                'site_bcity' => $this->request->getVar('site_bcity'),
                'site_bprov' => $this->request->getVar('site_bprov'),
                'site_bcount' => $this->request->getVar('site_bcount'),
                'site_bpost' => $this->request->getVar('site_bpost'),
                'site_bphone1' => $this->request->getVar('site_bphone1'),
                'site_bphone2' => $this->request->getVar('site_bphone2'),
                'site_bphone3' => $this->request->getVar('site_bphone3'),
                'site_madd' => $this->request->getVar('site_madd'),
                'site_mcity' => $this->request->getVar('site_mcity'),
                'site_mprov' => $this->request->getVar('site_mprov'),
                'site_mcount' => $this->request->getVar('site_mcount'),
                'site_mpost' => $this->request->getVar('site_mpost'),
                'site_mphone1' => $this->request->getVar('site_mphone1'),
                'site_mphone2' => $this->request->getVar('site_mphone2'),
                'site_mphone3' => $this->request->getVar('site_mphone3'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/site/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new SiteModel($request);
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
        
        return redirect()->to(base_url('/site/index'));
    }
}