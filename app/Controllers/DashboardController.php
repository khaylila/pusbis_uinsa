<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use Exception;

class DashboardController extends BaseController
{
    public function index()
    {
        dd(auth()->user()->syncGroups('superadmin'));
        return view('dashboard/index', ['user' => auth()->user()]);
    }

    public function sellerDashboard()
    {
        return view('seller/index');
    }

    public function superAdminDashboard()
    {
        return view('superadmin/index');
    }
}
