<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class CostTypeModel extends Model
{

    protected $table          = 'cost_type';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'type',
        'description',
        'group', 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'type'      => 'required|is_unique[cost_type.type]|min_length[1]|max_length[4]',
        'description'      => 'required',
        'group'      => 'required',       
    ];

    protected $column_order = ['id',  'type',
        'description',
        'group',];
    protected $column_search = [ 'type',
        'description',
        'group',
    ];
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

    public function getCostType($id = '')
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

    function deleteData($id, $data) 
    {
        $this->dt->where('id', $id);
        return $this->dt->update($data);
    }
}