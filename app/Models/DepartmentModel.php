<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class DepartmentModel extends Model
{

    protected $table          = 'department_master';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'comp_code', 'site_code', 'dept_code', 'dept_name', 'dept_pic'
        , 'dept_add', 'dept_city', 'dept_prov', 'dept_count', 'dept_post', 'dept_phone1', 'dept_phone2', 'dept_phone3'
        , 'dept_badd', 'dept_bcity', 'dept_bprov', 'dept_bcount', 'dept_bpost', 'dept_bphone1', 'dept_bphone2', 'dept_bphone3'
        , 'dept_madd', 'dept_mcity', 'dept_mprov', 'dept_mcount', 'dept_mpost', 'dept_mphone1', 'dept_mphone2', 'dept_mphone3'
        , 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'dept_code'      => 'required|is_unique[department_master.dept_code]|min_length[3]|max_length[12]',
        'comp_code'      => 'required',
        'site_code'      => 'required',
        'dept_name'      => 'required',
        'dept_pic'      => 'required',
    ];

    protected $column_order = ['id', 'comp_code', 'site_code', 'dept_code', 'dept_name', 'dept_pic'];
    protected $column_search = ['dept_code', 'comp_code', 'site_code', 'dept_name', 'dept_pic'];
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

    public function getDepartment($id = '')
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