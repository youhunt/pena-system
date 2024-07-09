<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class WarehouseModel extends Model
{

    protected $table          = 'warehouse_master';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'comp_code', 'site_code', 'dept_code', 'whs_code', 'whs_name', 'whs_pic'
        , 'whs_add', 'whs_city', 'whs_prov', 'whs_count', 'whs_post', 'whs_phone1', 'whs_phone2', 'whs_phone3'
        , 'whs_badd', 'whs_bcity', 'whs_bprov', 'whs_bcount', 'whs_bpost', 'whs_bphone1', 'whs_bphone2', 'whs_bphone3'
        , 'whs_madd', 'whs_mcity', 'whs_mprov', 'whs_mcount', 'whs_mpost', 'whs_mphone1', 'whs_mphone2', 'whs_mphone3'
        , 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'whs_code'      => 'required|is_unique[warehouse_master.whs_code]|min_length[3]|max_length[12]',
        'comp_code'      => 'required',
        'site_code'      => 'required',
        'dept_code'      => 'required',
        'whs_name'      => 'required',
        'whs_pic'      => 'required',
    ];

    protected $column_order = ['id', 'comp_code', 'site_code', 'dept_code', 'whs_code', 'whs_name', 'whs_pic'];
    protected $column_search = ['whs_code', 'comp_code', 'dept_code', 'site_code', 'whs_name', 'whs_pic'];
    protected $order = ['id' => 'ASC'];
    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);

    }

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    public function getWarehouse($id = '')
    {
        $this->dt->where('id', $id);
        $query = $this->dt->get();
        return $query->getResult();        
    }

    function updateData($id, $data) 
    {
        $this->dt->where('id', $id);
        return $this->dt->update($data);
    }

    function deleteData($id) 
    {
        $this->dt->where('id', $id);
        return $this->dt->delete();
    }
}