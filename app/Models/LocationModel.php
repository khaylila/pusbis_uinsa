<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup = 'location';

    public function getProvinces($search = '')
    {
        return $this->setTable('provinces')->select('id,name AS text')->like('name', $search)->findAll();
    }

    public function getRegencies($provinceId, $search)
    {
        return $this->setTable('regencies')->select('id,name AS text')->where('province_id', $provinceId)->like('name', $search)->findAll();
    }

    public function getDistricts($regencyId, $search)
    {
        return $this->setTable('districts')->select('id,name AS text')->where('regency_id', $regencyId)->like('name', $search)->findAll();
    }
}
