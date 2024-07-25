<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\UOMModel;
use App\Models\WarehouseModel;
use Config\Services;

class Item extends BaseController
{

    public function index()
	{
        $data['menu'] = 'setup';
        $data['submenu'] = 'item';

        $data['title'] = 'Item';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Item']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'MasterData']);
        return view('item/index', $data);
	}

    public function getItem()  
    {

        $request = Services::request();
        $datatable = new ItemModel($request);
        
        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row['id'] = $list->id;
                $row['item_code'] = $list->item_code;
                $row['item_name_1'] = $list->item_name_1;
                $row['item_name_2'] = $list->item_name_2;
                $row['item_code_additional'] = $list->item_code_additional;
                $row['item_name_additional'] = $list->item_name_additional;
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
            'title' => 'Add Item',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'item';
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Item']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'MasterData']);

        return view('item/add', $data);            
    }

    public function save()
    {
        $rules = [
            'item_code'      => 'required|is_unique[item_master.item_code]|min_length[3]|max_length[50]',
            'item_name_1'      => 'required',
            'shelf_life'      => 'required',
            'stockuom'      => 'required',
            'stockwhs'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ItemModel($request);
            $data = [
                'item_code' => $this->request->getPost('item_code'),
                'item_name_1' => $this->request->getPost('item_name_1'),
                'item_name_2' => $this->request->getPost('item_name_2'),
                'item_code_additional' => $this->request->getPost('item_code_additional'),
                'item_name_additional' => $this->request->getPost('item_name_additional'),
                'shelf_life' => $this->request->getPost('shelf_life'),
                'stockuom' => $this->request->getPost('stockuom'),
                'stockwhs' => $this->request->getPost('stockwhs'),
                'item_price' => $this->request->getPost('item_price'),
                'item_length' => $this->request->getPost('item_length'),
                'item_width' => $this->request->getPost('item_width'),
                'item_height' => $this->request->getPost('item_height'),
                'item_diameter' => $this->request->getPost('item_diameter'),
                'item_group' => $this->request->getPost('item_group'),
                'item_subgroup' => $this->request->getPost('item_subgroup'),
                'item_class' => $this->request->getPost('item_class'),
                'item_subclass' => $this->request->getPost('item_subclass'),
                'item_type' => $this->request->getPost('item_type'),
                'item_subtype' => $this->request->getPost('item_subtype'),
                'item_atribute' => $this->request->getPost('item_atribute'),
                'created_date'=>  date("Y-m-d H:i:s"),
                'created_by' =>  user()->username,
            ];
            
            $model->save($data);

            return redirect()->to(base_url('/item/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function edit($id)
    {        
        $request = Services::request();
        $dataItem = new ItemModel($request);
        $dataUOM = new UOMModel($request);
        $dataWhs = new WarehouseModel($request);
    
        $data = [            
            'title' => 'Update Item',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'item';
        $data['item'] = $dataItem->getItem($id);
        $data['uom'] = $data['item'][0]->stockuom ? $dataUOM->getUOM($data['item'][0]->stockuom)[0]->uom_desc : "";
        $data['whs'] = $data['item'][0]->stockwhs ? $dataWhs->getWarehouse($data['item'][0]->stockwhs)[0]->whs_name : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Item']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'MasterData']);

        return view('item/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getPost('id');
        $rules = [
            'item_code'      => 'required',
            'item_name_1'      => 'required',
            'shelf_life'      => 'required',
            'stockuom'      => 'required',
            'stockwhs'      => 'required',
        ];
    
        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if($this->validate($rules)){
            $request = Services::request();
            $model = new ItemModel($request);
            $data = [
                'item_code' => $this->request->getPost('item_code'),
                'item_name_1' => $this->request->getPost('item_name_1'),
                'item_name_2' => $this->request->getPost('item_name_2'),
                'item_code_additional' => $this->request->getPost('item_code_additional'),
                'item_name_additional' => $this->request->getPost('item_name_additional'),
                'shelf_life' => $this->request->getPost('shelf_life'),
                'stockuom' => $this->request->getPost('stockuom'),
                'stockwhs' => $this->request->getPost('stockwhs'),
                'item_price' => $this->request->getPost('item_price'),
                'item_length' => $this->request->getPost('item_length'),
                'item_width' => $this->request->getPost('item_width'),
                'item_height' => $this->request->getPost('item_height'),
                'item_diameter' => $this->request->getPost('item_diameter'),
                'item_group' => $this->request->getPost('item_group'),
                'item_subgroup' => $this->request->getPost('item_subgroup'),
                'item_class' => $this->request->getPost('item_class'),
                'item_subclass' => $this->request->getPost('item_subclass'),
                'item_type' => $this->request->getPost('item_type'),
                'item_subtype' => $this->request->getPost('item_subtype'),
                'item_atribute' => $this->request->getPost('item_atribute'),
                'updated_by' =>  user()->username,
                'updated_at' =>  date("Y-m-d H:i:s"),
            ];
            
            $model->updateData($id, $data);
            // $model->where('id', $id)->update($data);

            return redirect()->to(base_url('/item/index'));

        } else {
            
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }
    
    }

    public function delete()
    {
        $id =  $this->request->getPost('id');
        $request = Services::request();
        $model = new ItemModel($request);
        $active =  $this->request->getPost('active');
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
        
        return redirect()->to(base_url('/item/index'));
    }

    public function getAll()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('item_master');   

        $query = $builder->like('item_name_1', $this->request->getVar('q'))
                    ->select('id, item_name_1 as text')
                    ->limit(30)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}