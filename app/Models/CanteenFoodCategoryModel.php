<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class CanteenFoodCategoryModel extends Model
{
    protected $table      = 'canteens_categories';
    protected $allowedFields  = [
        'name',
    ];

    public function searchByName($search)
    {
        return $this->select('id,name AS text')->like('name', $search);
    }
}
