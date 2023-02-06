<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OwnUserModel extends Migration
{
    public function up()
    {
        $fields = [
            "gender" => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => TRUE,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
                'null'       => TRUE
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
                'null'       => TRUE
            ],
            'avatar' => [
                'type'       => 'VARCHAR',
                'constraint' => '1000',
                'null'       => TRUE
            ],
            'phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => TRUE
            ],
            'company' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => TRUE
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '1200',
                'null'       => TRUE
            ],
            'birth_day date default NULL',
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => TRUE,
                'default'    => 'id',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '400',
                'null'       => TRUE
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $fields = [
            'gender',
            'first_name',
            'last_name',
            'avatar',
            'phone_number',
            'company',
            'description',
            'birth_day',
            'country',
            'address',
        ];
        $this->forge->dropColumn('users', $fields);
    }
}
