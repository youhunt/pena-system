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
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'ItemMaster']);
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
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'ItemMaster']);

        return view('item/add', $data);            
    }

    public function save()
    {
        $rules = [
            'item_code'      => 'required|is_unique[item_master.item_code]|min_length[3]|max_length[50]',
            'item_name_1'      => 'required',
            'stockuom'      => 'required',
            'stockwhs'      => 'required',
            'item_lengthuom' => [
                                    'rules'  => 'required_with[item_length]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_lengthuom'),
                                    ],
                                ],            
            'item_widthuom' => [
                                    'rules'  => 'required_with[item_width]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_widthuom'),
                                    ],
                                ],
            'item_heightuom' => [
                                    'rules'  => 'required_with[item_height]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_heightuom'),
                                    ],
                                ],
            'item_diameteruom' => [
                                    'rules'  => 'required_with[item_diameter]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_diameteruom'),
                                    ],
                                ],
            'out_lengthuom' => [
                                    'rules'  => 'required_with[out_length]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_lengthuom'),
                                    ],
                                ],
            'out_widthuom' => [
                                    'rules'  => 'required_with[out_width]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_heightuom'),
                                    ],
                                ],
            'out_heightuom' => [
                                    'rules'  => 'required_with[out_height]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_heightuom'),
                                    ],
                                ],
            'out_diameteruom' => [
                                    'rules'  => 'required_with[out_diameter]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_diameter'),
                                    ],
                                ],
            'item_length' => [
                                    'rules'  => 'required_with[item_lengthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_length'),
                                    ],
                                ],            
            'item_width' => [
                                    'rules'  => 'required_with[item_widthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_width'),
                                    ],
                                ],
            'item_height' => [
                                    'rules'  => 'required_with[item_heightuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_height'),
                                    ],
                                ],
            'item_diameter' => [
                                    'rules'  => 'required_with[item_diameteruom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_diameter'),
                                    ],
                                ],
            'out_length' => [
                                    'rules'  => 'required_with[out_lengthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_length'),
                                    ],
                                ],
            'out_width' => [
                                    'rules'  => 'required_with[out_widthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_width'),
                                    ],
                                ],
            'out_height' => [
                                    'rules'  => 'required_with[out_heightuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_height'),
                                    ],
                                ],
            'out_diameter' => [
                                    'rules'  => 'required_with[out_diameteruom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_diameter'),
                                    ],
                                ],
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
                'item_lengthuom' => $this->request->getPost('item_lengthuom'),
                'item_widthuom' => $this->request->getPost('item_widthuom'),
                'item_heightuom' => $this->request->getPost('item_heightuom'),
                'item_diameteruom' => $this->request->getPost('item_diameteruom'),
                'out_length' => $this->request->getPost('out_length'),
                'out_width' => $this->request->getPost('out_width'),
                'out_height' => $this->request->getPost('out_height'),
                'out_diameter' => $this->request->getPost('out_diameter'),
                'out_lengthuom' => $this->request->getPost('out_lengthuom'),
                'out_widthuom' => $this->request->getPost('out_widthuom'),
                'out_heightuom' => $this->request->getPost('out_heightuom'),
                'out_diameteruom' => $this->request->getPost('out_diameteruom'),
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
        $data['uom'] = $data['item'][0]->stockuom ? $dataUOM->getUOM($data['item'][0]->stockuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->stockuom)[0]->uom_desc : "";
        $data['lengthuom'] = $data['item'][0]->item_lengthuom ? $dataUOM->getUOM($data['item'][0]->item_lengthuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->item_lengthuom)[0]->uom_desc : "";
        $data['widthuom'] = $data['item'][0]->item_widthuom ?       $dataUOM->getUOM($data['item'][0]->item_widthuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->item_widthuom)[0]->uom_desc      : "";
        $data['heightuom'] = $data['item'][0]->item_heightuom ?     $dataUOM->getUOM($data['item'][0]->item_heightuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->item_heightuom)[0]->uom_desc      : "";
        $data['diameteruom'] = $data['item'][0]->item_diameteruom ? $dataUOM->getUOM($data['item'][0]->item_diameteruom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->item_diameteruom)[0]->uom_desc    : "";
        $data['olengthuom'] = $data['item'][0]->out_lengthuom ?     $dataUOM->getUOM($data['item'][0]->out_lengthuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->out_lengthuom)[0]->uom_desc       : "";
        $data['owidthuom'] = $data['item'][0]->out_widthuom ?       $dataUOM->getUOM($data['item'][0]->out_widthuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->out_widthuom)[0]->uom_desc       : "";
        $data['oheightuom'] = $data['item'][0]->out_heightuom ?     $dataUOM->getUOM($data['item'][0]->out_heightuom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->out_heightuom)[0]->uom_desc      : "";
        $data['odiameteruom'] = $data['item'][0]->out_diameteruom ? $dataUOM->getUOM($data['item'][0]->out_diameteruom)[0]->uom_code."|".$dataUOM->getUOM($data['item'][0]->out_diameteruom)[0]->uom_desc    : "";
        $data['whs'] = $data['item'][0]->stockwhs ? $dataWhs->getWarehouse($data['item'][0]->stockwhs)[0]->whs_code."|".$dataWhs->getWarehouse($data['item'][0]->stockwhs)[0]->whs_name : "";
        $data['title_meta'] = view('partials/title-meta', ['title' => 'Item']);
        $data['page_title'] = view('partials/page-title', ['title' => 'Item', 'pagetitle' => 'ItemMaster']);

        return view('item/edit', $data);            
    }

    public function update()
    {
        $id =  $this->request->getPost('id');
        $rules = [
            'item_code'      => 'required',
            'item_name_1'      => 'required',
            'stockuom'      => 'required',
            'stockwhs'      => 'required',
            'item_lengthuom' => [
                                    'rules'  => 'required_with[item_length]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_lengthuom'),
                                    ],
                                ],            
            'item_widthuom' => [
                                    'rules'  => 'required_with[item_width]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_widthuom'),
                                    ],
                                ],
            'item_heightuom' => [
                                    'rules'  => 'required_with[item_height]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_heightuom'),
                                    ],
                                ],
            'item_diameteruom' => [
                                    'rules'  => 'required_with[item_diameter]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.item_size').' '.lang('Item.item_diameteruom'),
                                    ],
                                ],
            'out_lengthuom' => [
                                    'rules'  => 'required_with[out_length]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_lengthuom'),
                                    ],
                                ],
            'out_widthuom' => [
                                    'rules'  => 'required_with[out_width]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_heightuom'),
                                    ],
                                ],
            'out_heightuom' => [
                                    'rules'  => 'required_with[out_height]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_heightuom'),
                                    ],
                                ],
            'out_diameteruom' => [
                                    'rules'  => 'required_with[out_diameter]',
                                    'errors' => [
                                        'required_with' => 'Please select '.lang('Item.process_size').' '.lang('Item.out_diameter'),
                                    ],
                                ],
            'item_length' => [
                                    'rules'  => 'required_with[item_lengthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_length'),
                                    ],
                                ],            
            'item_width' => [
                                    'rules'  => 'required_with[item_widthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_width'),
                                    ],
                                ],
            'item_height' => [
                                    'rules'  => 'required_with[item_heightuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_height'),
                                    ],
                                ],
            'item_diameter' => [
                                    'rules'  => 'required_with[item_diameteruom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.item_size').' '.lang('Item.item_diameter'),
                                    ],
                                ],
            'out_length' => [
                                    'rules'  => 'required_with[out_lengthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_length'),
                                    ],
                                ],
            'out_width' => [
                                    'rules'  => 'required_with[out_widthuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_width'),
                                    ],
                                ],
            'out_height' => [
                                    'rules'  => 'required_with[out_heightuom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_height'),
                                    ],
                                ],
            'out_diameter' => [
                                    'rules'  => 'required_with[out_diameteruom]',
                                    'errors' => [
                                        'required_with' => 'Please input '.lang('Item.process_size').' '.lang('Item.out_diameter'),
                                    ],
                                ],
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
                'item_lengthuom' => $this->request->getPost('item_lengthuom'),
                'item_widthuom' => $this->request->getPost('item_widthuom'),
                'item_heightuom' => $this->request->getPost('item_heightuom'),
                'item_diameteruom' => $this->request->getPost('item_diameteruom'),
                'out_length' => $this->request->getPost('out_length'),
                'out_width' => $this->request->getPost('out_width'),
                'out_height' => $this->request->getPost('out_height'),
                'out_diameter' => $this->request->getPost('out_diameter'),
                'out_lengthuom' => $this->request->getPost('out_lengthuom'),
                'out_widthuom' => $this->request->getPost('out_widthuom'),
                'out_heightuom' => $this->request->getPost('out_heightuom'),
                'out_diameteruom' => $this->request->getPost('out_diameteruom'),
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

        $query = $builder
                ->select('id, concat(item_code,"|",item_name_1) as text')
                ->limit(30)->get();
        if ($this->request->getPost('q')) {
            $query = $builder
                    ->like('item_code', $this->request->getPost('q'))
                    ->orLike('item_name_1', $this->request->getPost('q'))
                    ->orLike('item_name_2', $this->request->getPost('q'))
                    ->select('id, concat(item_code,"|",item_name_1) as text')
                    ->limit(30)->get();
        }
        
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}