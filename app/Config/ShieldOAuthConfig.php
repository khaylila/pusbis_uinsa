<?php

declare(strict_types=1);

/**
 * This file is part of Shield OAuth.
 *
 * (c) Datamweb <pooya_parsa_dadashi@yahoo.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use Datamweb\ShieldOAuth\Config\ShieldOAuthConfig as OAuthConfig;

class ShieldOAuthConfig extends OAuthConfig
{
    public array $oauthConfigs;

    // public function __construct()
    // {
    //     helper('setting');

    //     $this->oauthConfigs = [
    //         'google' => [
    //             'client_id'     => setting()->get('ShieldOAuthConfig.googleID'),
    //             'client_secret' => setting()->get('ShieldOAuthConfig.googleSecret'),

    //             'allow_login' => true,
    //         ],
    //     ];
    //     $this->oauthConfigs = [
    //         'google' => [
    //             'client_id'     => '1098264855057-e4m37v8g6jsf6qa9i6steq0sj4qp90e5.apps.googleusercontent.com',
    //             'client_secret' => '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',

    //             'allow_login' => true,
    //         ],
    //     ];
    // }


    /*
    * If you use different names for the columns in the users table, use the following settings.

    * Data of Table "users":
    * +----+----------+--------+...+------------+-----------+--------+
    * | id | username | status |...| first_name | last_name | avatar |
    * +----+----------+--------+...+------------+-----------+--------+
    * In fact, you set in which column the information received from the services should be recorded.
    * For example, the first name received from OAuth should be recorded in column 'first_name' of the 'users' table shield.
    *
    * NOTE :
    *       This is suitable for those who have already installed the shield and created their own columns.
    *       In this case, there is no need to execute `php spark migrate -n Datamweb\ShieldOAuth`.
    *       Just set the following values with your table columns.
    */
    public array $usersColumnsName = [
        'first_name' => 'first_name',
        'last_name'  => 'last_name',
        'avatar'     => 'avatar',
    ];

    /*
    * If the user is already registered, by default when trying to login, he/she information will be synchronized.
    * if you want to cancel it, set false.
    */
    public bool $syncingUserInfo = true;

    /*
    * When the user login with his profile, the OAuth server directs him to the following path.
    * So change this value only when you need to make an order.
    * By default it returns to the following path:
    * http:\\localhost:8080\oauth\call-back
    */
    public string $call_back_route = 'call-back';

    public function changeOauthConfig()
    {
        $this->oauthConfigs = [
            'google' => [
                'client_id'     => service('settings')->get('ShieldOAuthConfig.googleID'),
                'client_secret' => service('settings')->get('ShieldOAuthConfig.googleSecret'),

                'allow_login' => true,
            ],
        ];
        return $this;
    }
}
