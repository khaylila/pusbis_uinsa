<?php

namespace App\Controllers;

use App\Models\CanteenModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use Exception;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard'
        ]);
    }

    public function sellerDashboard()
    {
        if (model(CanteenModel::class)->where('user_id', user_id())->first()['setup_wizzard'] < 3) {
            return redirect()->to('setup-wizzard');
        }
        return view('canteen/seller/index', [
            'title' => 'Dashboard',
            'sidebar' => ['dashboard'],
            'breadcrumbs' => [
                ['title' => 'Root', 'link' => '/'],
                ['title' => 'Dashboard', 'active' => true],
            ]
        ]);
    }

    public function superAdminDashboard()
    {
        return view('superadmin/index', [
            'title' => 'Dashboard',
            'sidebar' => ['dashboard'],
            'breadcrumbs' => [
                ['title' => 'Root', 'link' => '/'],
                ['title' => 'Dashboard', 'active' => true],
            ]
        ]);
    }
}
