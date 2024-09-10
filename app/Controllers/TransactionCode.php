<?php

namespace App\Controllers;

use App\Models\TransactionCodeModel;
use App\Models\DepartmentModel;
use App\Models\CompanyModel;
use App\Models\SiteModel;
use App\Models\CountriesModel;
use App\Models\ProvincesModel;
use App\Models\CitiesModel;
use Config\Services;

class TransactionCode extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';

        $data['title'] = 'TransactionCode';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'TransactionCode']);
        $data['page_title'] = view('partials/page-title', ['title' => 'TransactionCode', 'pagetitle' => 'MasterData']);
        return view('transactioncode/index', $data);
	}

    public function getTransactionCode()  
    {

        $request = Services::request();
        $datatable = new TransactionCodeModel($request);
        $dataCom = new CompanyModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['company'] = $list->company ? $dataCom->getCompany($list->company)[0]->comp_name : "";
                $row['site'] = $list->site ? $dataSit->getSite($list->site)[0]->site_name : "";
                $row['dept'] = $list->dept ? $dataDep->getDepartment($list->dept)[0]->dept_name : "";
                $row['transcode'] = $list->transcode;
                $row['transname'] = $list->transname;
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
        $data = [            
            'title' => 'Add TransactionCode',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'whs';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'TransactionCode']);
        $data['page_title'] = view('partials/page-title', ['title' => 'TransactionCode', 'pagetitle' => 'MasterData']);
        
        return view('transactioncode/add', $data);            
    }

    public function save()
    {
        $rules = [
            'company' => 'required',
            'site' => 'required',
            'dept' => 'required',
            'transcode' => 'required|is_unique[transaction_code.transcode]',
            'transname' => 'required',
            'module' => 'required',
            'transtype' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new TransactionCodeModel($request);
            $data = [
                'company' => $this->request->getVar('company'),
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'transcode' => $this->request->getVar('transcode'),
                'transname' => $this->request->getVar('transname'),
                'module' => $this->request->getVar('module'),
                'transtype' => $this->request->getVar('transtype'),
                'transnumber' => $this->request->getVar('transnumber'),
                'transdescription' => $this->request->getVar('transdescription'),
                'glcode' => $this->request->getVar('glcode'),
                'created_by' =>  user()->username,
                'created_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/transactioncode/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataCom = new CompanyModel($request);
        $dataWhs = new TransactionCodeModel($request);
        $dataSit = new SiteModel($request);
        $dataDep = new DepartmentModel($request);
    
        $data = [            
            'title' => 'Update TransactionCode',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'transactioncode';
        $data['transactioncode'] = $dataWhs->getTransactionCode($id);
        $data['dept_name'] = $data['transactioncode'][0]->dept ? $dataDep->getDepartment($data['transactioncode'][0]->dept)[0]->dept_code."|".$dataDep->getDepartment($data['transactioncode'][0]->dept)[0]->dept_name : "";
        $data['site_name'] = $data['transactioncode'][0]->site ? $dataSit->getSite($data['transactioncode'][0]->site)[0]->site_code."|".$dataSit->getSite($data['transactioncode'][0]->site)[0]->site_name : "";
        $data['comp_name'] = $data['transactioncode'][0]->company ? $dataCom->getCompany($data['transactioncode'][0]->company)[0]->comp_code."|".$dataCom->getCompany($data['transactioncode'][0]->company)[0]->comp_name : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'TransactionCode']);
        $data['page_title'] = view('partials/page-title', ['title' => 'TransactionCode', 'pagetitle' => 'MasterData']);
        
        return view('transactioncode/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'company' => 'required',
            'site' => 'required',
            'dept' => 'required',
            'transcode' => 'required',
            'transname' => 'required',
            'module' => 'required',
            'transtype' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new TransactionCodeModel($request);
            $data = [
                'company' => $this->request->getVar('company'),
                'site' => $this->request->getVar('site'),
                'dept' => $this->request->getVar('dept'),
                'transcode' => $this->request->getVar('transcode'),
                'transname' => $this->request->getVar('transname'),
                'module' => $this->request->getVar('module'),
                'transtype' => $this->request->getVar('transtype'),
                'transnumber' => $this->request->getVar('transnumber'),
                'transdescription' => $this->request->getVar('transdescription'),
                'glcode' => $this->request->getVar('glcode'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/transactioncode/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new TransactionCodeModel($request);
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
        
        return redirect()->to(base_url('/transactioncode/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('transaction_code');   

        $query = $builder
                ->select('id, concat(transcode,"|", transname) as text')
                ->limit(30)->get();

        if ($this->request->getVar('q')) {
            $query = $builder
                    ->like('transcode', $this->request->getVar('q'))
                    ->orLike('transname', $this->request->getVar('q'))
                    ->select('id, concat(transcode,"|", transname) as text')
                    ->limit(30)->get();
        }

        $data = $query->getResult();
        
		echo json_encode($data);
    }

}