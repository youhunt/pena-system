<?php

namespace App\Controllers;

use App\Models\ItemModel;
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
                'item_code' => $this->request->getVar('item_code'),
                'item_name_1' => $this->request->getVar('item_name_1'),
                'item_name_2' => $this->request->getVar('item_name_2'),
                'item_code_additional' => $this->request->getVar('item_code_additional'),
                'item_name_additional' => $this->request->getVar('item_name_additional'),
                'shelf_life' => $this->request->getVar('shelf_life'),
                'stockuom' => $this->request->getVar('stockuom'),
                'stockwhs' => $this->request->getVar('stockwhs'),
                'item_price' => $this->request->getVar('item_price'),
                'item_length' => $this->request->getVar('item_length'),
                'item_width' => $this->request->getVar('item_width'),
                'item_height' => $this->request->getVar('item_height'),
                'item_diameter' => $this->request->getVar('item_diameter'),
                'item_group' => $this->request->getVar('item_group'),
                'item_subgroup' => $this->request->getVar('item_subgroup'),
                'item_class' => $this->request->getVar('item_class'),
                'item_subclass' => $this->request->getVar('item_subclass'),
                'item_type' => $this->request->getVar('item_type'),
                'item_subtype' => $this->request->getVar('item_subtype'),
                'item_atribute' => $this->request->getVar('item_atribute'),
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
    
        $data = [            
            'title' => 'Update Item',
        ];
        $data['menu'] = 'setup';
        $data['submenu'] = 'item';
        $data['item'] = $dataItem->getItem($id);
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Item']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'MasterData']);

        return view('item/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
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
                'item_code' => $this->request->getVar('item_code'),
                'item_name_1' => $this->request->getVar('item_name_1'),
                'item_name_2' => $this->request->getVar('item_name_2'),
                'item_code_additional' => $this->request->getVar('item_code_additional'),
                'item_name_additional' => $this->request->getVar('item_name_additional'),
                'shelf_life' => $this->request->getVar('shelf_life'),
                'stockuom' => $this->request->getVar('stockuom'),
                'stockwhs' => $this->request->getVar('stockwhs'),
                'item_price' => $this->request->getVar('item_price'),
                'item_length' => $this->request->getVar('item_length'),
                'item_width' => $this->request->getVar('item_width'),
                'item_height' => $this->request->getVar('item_height'),
                'item_diameter' => $this->request->getVar('item_diameter'),
                'item_group' => $this->request->getVar('item_group'),
                'item_subgroup' => $this->request->getVar('item_subgroup'),
                'item_class' => $this->request->getVar('item_class'),
                'item_subclass' => $this->request->getVar('item_subclass'),
                'item_type' => $this->request->getVar('item_type'),
                'item_subtype' => $this->request->getVar('item_subtype'),
                'item_atribute' => $this->request->getVar('item_atribute'),
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
        $id =  $this->request->getVar('id');
        $request = Services::request();
        $model = new ItemModel($request);
        $model->deleteData($id);
        
        return redirect()->to(base_url('/item/index'));
    }
}