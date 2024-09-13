<?php

namespace App\Controllers;

use App\Models\InvTransModel;
use App\Models\UOMModel;
use App\Models\ItemModel;
use App\Models\TransactionCodeModel;
use App\Models\LocationModel;
use Config\Services;
use CodeIgniter\Session\Session;

class InvTrans extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = service('session');
    }

    public function index()
	{
        $data['menu'] = 'item';
        $data['submenu'] = 'invtrans';

        $data['title'] = 'InvTrans';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'InvTrans']);
        $data['page_title'] = view('partials/page-title', ['title' => 'InvTrans', 'pagetitle' => 'MasterData']);
        return view('invtrans/index', $data);
	}

    public function getInvTrans()  
    {

        $request = Services::request();
        $datatable = new InvTransModel($request);
        $dataUOM = new UOMModel($request);
        $dataItem = new ItemModel($request);
        $dataTransCode = new TransactionCodeModel($request);
        $dataLoc = new LocationModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['trans_code'] = $list->trans_code ? $dataTransCode->getTransactionCode($list->trans_code)[0]->transcode : "";
                $row['trans_no'] = $list->trans_no;
                $row['item_code'] = $list->item_code ? $dataItem->getItem($list->item_code)[0]->item_code : "";
                $row['loc_code'] = $list->loc_code;
                $row['batch_no'] = $list->batch_no;
                $row['multiplier'] = $list->multiplier;
                $row['divider'] = $list->divider;
                $row['qtyunit'] = $list->qtyunit;
                $row['stockunit_uom'] = $list->stockunit_uom ? $dataUOM->getUOM($list->stockunit_uom)[0]->uom_desc : "";
                $row['qty'] = $list->qty;
                $row['stock_uom'] = $list->stock_uom ? $dataUOM->getUOM($list->stock_uom)[0]->uom_desc : "";
                $row['description'] = $list->description;
                $row['length'] = $list->length;
                $row['luom'] = $list->luom ? $dataUOM->getUOM($list->luom)[0]->uom_desc : "";
                $row['width'] = $list->width;
                $row['wuom'] = $list->wuom ? $dataUOM->getUOM($list->wuom)[0]->uom_desc : "";
                $row['height'] = $list->height;
                $row['huom'] = $list->huom ? $dataUOM->getUOM($list->huom)[0]->uom_desc : "";
                $row['diameter'] = $list->diameter;
                $row['duom'] = $list->duom ? $dataUOM->getUOM($list->duom)[0]->uom_desc : "";
                $row['active'] = $list->active;
                $row['no'] = '';
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

    public function saveTrans() {
        $request = Services::request();

        $session = session();
        $lists = $session->transData;

        $rules = [
            'trans_code' => 'required',
            'trans_no' => 'required',
            'item_code' => 'required',
            'loc_code' => 'required',
            'qty' => 'required',
            'stock_uom' => 'required', 
        ];
    
        if($this->validate($rules)) {
            $data = [
                'id' => (is_countable($lists) ? count($lists) : 0) + 1,
                'trans_code' => $this->request->getVar('trans_code'),
                'trans_no' => $this->request->getVar('trans_no'),
                'item_code' => $this->request->getVar('item_code'),
                'itemname' => explode("|", $this->request->getVar('itemname'))[0],
                'loc_code' => $this->request->getVar('loc_code'),
                'locname' => explode("|", $this->request->getVar('locname'))[0],
                'batch_no' => $this->request->getVar('batch_no'),
                'multiplier' => $this->request->getVar('multiplier'),
                'divider' => $this->request->getVar('divider'),
                'qtyunit' => $this->request->getVar('qtyunit'),
                'stockunit_uom' => $this->request->getVar('stockunit_uom'),
                'qty' => $this->request->getVar('qty'),
                'stock_uom' => $this->request->getVar('stock_uom'),
                'description' => $this->request->getVar('description'),
                'length' => $this->request->getVar('length'),
                'luom' => $this->request->getVar('luom'),
                'width' => $this->request->getVar('width'),
                'wuom' => $this->request->getVar('wuom'),
                'height' => $this->request->getVar('height'),
                'huom' => $this->request->getVar('huom'),
                'diameter' => $this->request->getVar('diameter'),
                'duom' => $this->request->getVar('duom'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];

            $lists[] = $data;

            $session->set('transData', $lists);

            $output = [
                'Success' => true,
                'Counter' =>  count($lists),
                'errors' =>  [],
            ];
        } else {
            $output = [
                'Success' => false,
                'Counter' =>  9999,
                'errors' =>  $this->validator->getErrors(),
            ];
        }

        echo json_encode($output);

    }

    public function getTrans()  
    {
        $request = Services::request();
        
        $session = session();
        $lists = $session->transData;
        
        if ($request->getMethod(true) === 'POST') {
            $data = [];
            $no = $request->getPost('start');
            
            if (isset($lists)) {
                foreach ($lists as $list) {
                    $no++;
                    $row = [];
                    $row['id'] = $list['id'];
                    $row['trans_code'] = $list['trans_code'];
                    $row['trans_no'] = $list['trans_no'];
                    $row['item_code'] = $list['item_code'];
                    $row['itemname'] = $list['itemname'];
                    $row['loc_code'] = $list['loc_code'];
                    $row['locname'] = $list['locname'];
                    $row['batch_no'] = $list['batch_no'];
                    $row['multiplier'] = $list['multiplier'];
                    $row['divider'] = $list['divider'];
                    $row['qtyunit'] = $list['qtyunit'];
                    $row['stockunit_uom'] = $list['stockunit_uom'];
                    $row['qty'] = $list['qty'];
                    $row['stock_uom'] = $list['stock_uom'];
                    $row['description'] = $list['description'];
                    $row['length'] = $list['length'];
                    $row['luom'] = $list['luom'];
                    $row['width'] = $list['width'];
                    $row['wuom'] = $list['wuom'];
                    $row['height'] = $list['height'];
                    $row['huom'] = $list['huom'];
                    $row['diameter'] = $list['diameter'];
                    $row['duom'] = $list['duom'];
                    $data[] = $row;
                }
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => count($data),
                'recordsFiltered' => count($data),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function add()
    {        
    
        $session = session();
        $session->remove('transData');

        $data = [            
            'title' => 'Add InvTrans',
        ];
        $data['menu'] = 'item';
        $data['submenu'] = 'invtrans';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'InvTrans']);
        $data['page_title'] = view('partials/page-title', ['title' => 'InvTrans', 'pagetitle' => 'MasterData']);
        
        return view('invtrans/add', $data);            
    }

    public function getTransNo() {
        
        $transDate = date("YmdHist");

        $output = [
            'data' => $transDate,
        ];

        echo json_encode($output);
    }

    public function save()
    {
        // $rules = [
        //     'trans_code' => 'required',
        //     'trans_no' => 'required',
        //     'item_code' => 'required',
        //     'loc_code' => 'required',
        //     'qty' => 'required',
        //     'stock_uom' => 'required', 
        // ];
    
        // if (! $this->validate($rules))
        // {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        // if($this->validate($rules)){
        //     $request = Services::request();
        //     $model = new InvTransModel($request);
        //     $data = [
        //         'trans_code' => $this->request->getVar('trans_code'),
        //         'trans_no' => $this->request->getVar('trans_no'),
        //         'item_code' => $this->request->getVar('item_code'),
        //         'loc_code' => $this->request->getVar('loc_code'),
        //         'batch_no' => $this->request->getVar('batch_no'),
        //         'multiplier' => $this->request->getVar('multiplier'),
        //         'divider' => $this->request->getVar('divider'),
        //         'qtyunit' => $this->request->getVar('qtyunit'),
        //         'stockunit_uom' => $this->request->getVar('stockunit_uom'),
        //         'qty' => $this->request->getVar('qty'),
        //         'stock_uom' => $this->request->getVar('stock_uom'),
        //         'description' => $this->request->getVar('description'),
        //         'length' => $this->request->getVar('length'),
        //         'luom' => $this->request->getVar('luom'),
        //         'width' => $this->request->getVar('width'),
        //         'wuom' => $this->request->getVar('wuom'),
        //         'height' => $this->request->getVar('height'),
        //         'huom' => $this->request->getVar('huom'),
        //         'diameter' => $this->request->getVar('diameter'),
        //         'duom' => $this->request->getVar('duom'),
        //         'created_date'=>  date("Y-m-d H:i:s"),
        //         'created_by' =>  user()->username,
        //     ];
            
        //     $model->save($data);

        //     return redirect()->to(base_url('/invtrans/index'));

        // } else {
            
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        // }

        $session = session();
        $lists = $session->transData;

        if (isset($lists)) {
            $request = Services::request();
            $model = new InvTransModel($request);

            foreach ($lists as $list) {
                $data = [
                    'trans_code' => $list['trans_code'],
                    'trans_no' => $list['trans_no'],
                    'item_code' => $list['item_code'],
                    'loc_code' => $list['loc_code'],
                    'batch_no' => $list['batch_no'],
                    'multiplier' => $list['multiplier'],
                    'divider' => $list['divider'],
                    'qtyunit' => $list['qtyunit'],
                    'stockunit_uom' => $list['stockunit_uom'],
                    'qty' => $list['qty'],
                    'stock_uom' => $list['stock_uom'],
                    'description' => $list['description'],
                    'length' => $list['length'],
                    'luom' => $list['luom'],
                    'width' => $list['width'],
                    'wuom' => $list['wuom'],
                    'height' => $list['height'],
                    'huom' => $list['huom'],
                    'diameter' => $list['diameter'],
                    'duom' => $list['duom'],
                    'created_date'=>  date("Y-m-d H:i:s"),
                    'created_by' =>  user()->username,
                ];
                try
                {
                    $saved = $model->save($data);
                    // return redirect()->to(base_url('/invtrans/index'));
                    if ($saved) {
                        $output = [
                            'Success' => true,
                            'Counter' =>  $model->countAll(),
                            'errors' => $model->errors(),
                        ];
                    } else {
                        $output = [
                            'Success' => false,
                            'Counter' =>  9999,
                            'errors' => $model->errors(),
                        ];
                    }
                } catch (DatabaseException $e) {
                    $output = [
                        'Success' => false,
                        'Counter' =>  9999,
                        'errors' => ['Data already exists.'],
                    ];
                }

            }

            echo json_encode($output);

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataInvTrans = new InvTransModel($request);
    
        $data = [            
            'title' => 'Update InvTrans',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'invtrans';
        $data['invtrans'] = $dataInvTrans->getInvTrans($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'InvTrans']);
        $data['page_title'] = view('partials/page-title', ['title' => 'InvTrans', 'pagetitle' => 'MasterData']);

        return view('invtrans/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rules = [
            'trans_code' => 'required',
            'trans_no' => 'required',
            'item_code' => 'required',
            'loc_code' => 'required',
            'qty' => 'required',
            'stock_uom' => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new InvTransModel($request);
            $data = [
                'trans_code' => $this->request->getVar('trans_code'),
                'trans_no' => $this->request->getVar('trans_no'),
                'item_code' => $this->request->getVar('item_code'),
                'loc_code' => $this->request->getVar('loc_code'),
                'batch_no' => $this->request->getVar('batch_no'),
                'multiplier' => $this->request->getVar('multiplier'),
                'divider' => $this->request->getVar('divider'),
                'qtyunit' => $this->request->getVar('qtyunit'),
                'stockunit_uom' => $this->request->getVar('stockunit_uom'),
                'qty' => $this->request->getVar('qty'),
                'stock_uom' => $this->request->getVar('stock_uom'),
                'description' => $this->request->getVar('description'),
                'length' => $this->request->getVar('length'),
                'luom' => $this->request->getVar('luom'),
                'width' => $this->request->getVar('width'),
                'wuom' => $this->request->getVar('wuom'),
                'height' => $this->request->getVar('height'),
                'huom' => $this->request->getVar('huom'),
                'diameter' => $this->request->getVar('diameter'),
                'duom' => $this->request->getVar('duom'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/invtrans/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new InvTransModel($request);
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
        
        return redirect()->to(base_url('/invtrans/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('invtrans');   

        $query = $builder
                    ->select('id, concat(invtrans_code,"|", invtrans_desc) as text')
                    ->limit(30)->get();

        if ($this->request->getVar('q')) {
            $query = $builder
                    ->like('invtrans_desc', $this->request->getVar('q'))
                    ->orLike('invtrans_code', $this->request->getVar('q'))
                    ->select('id, concat(invtrans_code,"|", invtrans_desc) as text')
                    ->limit(30)->get();
        }
        
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}