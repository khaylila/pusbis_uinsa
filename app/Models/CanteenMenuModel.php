<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class CanteenMenuModel extends Model
{
    protected $table      = 'canteens_menu';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'name',
        'qty',
        'price',
        'description',
        'picture',
        'typefood',
        'category',
        'canteen_id',
    ];
    protected $useTimestamps = true;
}
