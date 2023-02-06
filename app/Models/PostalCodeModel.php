<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Models\LocationModel;

class PostalCodeModel extends Model
{
    protected $DBGroup = 'postalCode';

    public function getUrbans($districtId, $search)
    {
        $district = model(LocationModel::class, false)->setTable('districts')->where('id', $districtId)->first();
        $regency = model(LocationModel::class, false)->setTable('regencies')->where('id', $district['regency_id'])->first();
        $regency['name'] = explode(" ", $regency['name'], 2)[1];

        return $this->setTable('db_postal_code_data')->select('id,urban AS text')->where('province_code', $regency['province_id'])->where('city', $regency['name'])->where('sub_district', $district['name'])->like('urban', $search)->findAll();
    }
}
