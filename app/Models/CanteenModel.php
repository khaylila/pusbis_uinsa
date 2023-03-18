<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class CanteenModel extends Model
{
    protected $table      = 'canteens';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'name',
        'location',
        'user_id',
        'setup_wizzard',
        'cod',
        'logo_kantin'
    ];
    protected $useTimestamps = true;
    protected $beforeDelete   = ['removeUserCanteen'];

    public function selectCanteen($search = '')
    {
        return $this->select('canteens.name as name_canteen,canteens.id,location,first_name,last_name')->join('users', 'users.id = canteens.user_id')
            ->where('canteens.deleted_at !=', null)
            ->groupStart()
            ->like('canteens.name', $search)->orLike('users.first_name', $search)->orLike('users.last_name', $search)
            ->groupEnd();
    }

    public function getCanteenID($userId)
    {
        return $this->select('id')->where('user_id', user_id())->first()['id'] ?? null;
    }

    // public function getUserCanteen($userId)
    // {
    //     return $this->select('name,id,location')->where('user_id', $userId)->first();
    // }

    protected function removeUserCanteen(array $data)
    {
        $userCanteen = $this->select('user_id')->where('id', $data['id'])->first();
        $userId = $userCanteen['user_id'];
        try {
            model(OwnUserModel::class)->delete($userId);
        } catch (DatabaseException $e) {
            log_message('error', json_encode(model(OwnUserModel::class)->errors()));
        }
    }
}
