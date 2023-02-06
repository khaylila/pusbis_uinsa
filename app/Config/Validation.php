<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $registration = [
        'first_name' => [
            'rules' => 'required|alpha_space|min_length[3]|max_length[128]',
        ],
        'last_name' => [
            'rules' => 'required|alpha_space|min_length[3]|max_length[128]',
        ],
        'username' => [
            'rules' => 'required|alpha_numeric|min_length[4]|max_length[30]|is_unique[users.username]',
        ],
        'phone' => [
            'rules' => 'required|numeric|min_length[7]|max_length[20]|is_unique[users.phone_number]',
        ],
        'email' => [
            'rules' => 'required|valid_email|min_length[8]|max_length[128]|is_unique[auth_identities.secret]',
        ],
        'province' => [
            'rules' => 'required'
        ],
        'city' => [
            'rules' => 'required'
        ],
        'regency' => [
            'rules' => 'required'
        ],
        'district' => [
            'rules' => 'required'
        ],
        'address' => [
            'rules' => 'required|max_length[400]'
        ],
        'agree' => 'required',
    ];
}
