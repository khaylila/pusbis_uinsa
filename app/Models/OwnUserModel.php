<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel;

class OwnUserModel extends UserModel
{
    protected $allowedFields  = [
        'username',
        'status',
        'status_message',
        'active',
        'last_active',
        'deleted_at',
        'gender',
        'first_name',
        'last_name',
        'avatar',
        'phone_number',
        'company',
        'description',
        'birth_day ',
        'country',
        'address',
    ];
}
