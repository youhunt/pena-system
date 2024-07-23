<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class SiteModel extends Model
{

    protected $table          = 'site_master';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'comp_code', 'site_code', 'site_name', 'site_pic', 'site_taxid'
        , 'site_add', 'site_city', 'site_prov', 'site_count', 'site_post', 'site_phone1', 'site_phone2', 'site_phone3'
        , 'site_badd', 'site_bcity', 'site_bprov', 'site_bcount', 'site_bpost', 'site_bphone1', 'site_bphone2', 'site_bphone3'
        , 'site_madd', 'site_mcity', 'site_mprov', 'site_mcount', 'site_mpost', 'site_mphone1', 'site_mphone2', 'site_mphone3'
        , 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'site_code'      => 'required|is_unique[site_master.site_code]|min_length[3]|max_length[12]',
        'comp_code'      => 'required',
        'site_name'      => 'required',
        'site_pic'      => 'required',
        'site_taxid'      => 'required',
    ];

    protected $column_order = ['id', 'comp_code', 'site_code', 'site_name', 'site_pic'];
    protected $column_search = ['site_code', 'comp_code', 'site_name', 'site_pic'];
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

    public function getSite($id = '')
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