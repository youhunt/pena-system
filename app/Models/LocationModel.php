<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class LocationModel extends Model
{

    protected $table          = 'location_master';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'comp_code', 'site_code', 'whs_code', 'loc_code', 'loc_name', 'loc_pic'
        , 'loc_add', 'loc_city', 'loc_prov', 'loc_count', 'loc_post', 'loc_phone1', 'loc_phone2', 'loc_phone3'
        , 'whs_dadd', 'whs_dcity', 'whs_dprov', 'whs_dcount', 'whs_dpost', 'whs_dphone1', 'whs_dphone2', 'whs_dphone3'        , 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'loc_code'      => 'required|is_unique[location_master.loc_code]|min_length[3]|max_length[12]',
        'comp_code'      => 'required',
        'whs_code'      => 'required',
        'site_code'      => 'required',
        'loc_name'      => 'required',
        'loc_pic'      => 'required',
    ];

    protected $column_order = ['id', 'whs_code', 'comp_code', 'site_code', 'loc_code', 'loc_name', 'loc_pic'];
    protected $column_search = ['whs_code','loc_code', 'comp_code', 'site_code', 'loc_name', 'loc_pic'];
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

    public function getLocation($id = '')
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