<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class CitiesModel extends Model
{

    protected $table          = 'cities';
    protected $primaryKey     = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id', 'city_code', 'city_name', 'country_id',  'province_id', 
    ];
    protected $useTimestamps   = true;
    protected $validationRules = [
        'city_name'      => 'required|alpha_numeric_punct|min_length[3]|max_length[100]',
        'city_code'      => 'required',
        'country_id'      => 'required',
        'province_id'      => 'required',
    ];

    protected $column_order = ['id', 'city_code', 'city_name', 'country', 'province'];
    protected $column_search = ['city_code', 'city_name', 'country', 'province'];
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

    public function getByCountry($id = '')
    {
        $this->dt->where('country_id', $id);
        $query = $this->dt->get();
        return $query->getResult();        
    }

    public function getByProvince($id = '')
    {
        $this->dt->where('province_id', $id);
        $query = $this->dt->get();
        return $query->getResult();        
    }

    public function getCities($id = '')
    {
        $this->dt->select('cities.id, city_code, city_name, cities.country_id, cities.province_id, cities.active, concat(countries.country_code,"|",countries.country_name) as country, concat(provinces.province_code,"|",provinces.province_name) as province');
        $this->dt->join('countries', 'countries.id = cities.country_id');
        $this->dt->join('provinces', 'provinces.id = cities.province_id');
        $this->dt->where('cities.id', $id);
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