<?php

namespace App\Models;

use CodeIgniter\Model;

class CanteenGroupModel extends Model
{
    protected $table      = 'canteens_group';

    public function getCanteenID($userID)
    {
        return $this->select('canteen_id')->where('user_id', user_id())->first()['canteen_id'] ?? false;
    }
}
