<?php

namespace Config;

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Api\LocationController;
use App\Controllers\Auth\MagicLinkController;
use App\Controllers\Auth\OAuthController;
use App\Controllers\Canteen\AdminCanteenController;
use App\Controllers\Canteen\SellerCanteenController;
use App\Controllers\DashboardController;
use App\Controllers\ErrorsController;
use App\Controllers\Home;
use App\Controllers\MikhmonController;
use App\Controllers\ProfileController;
use App\Controllers\TelegramController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Home::index');
$routes->get('/main-menu', [Home::class, "mainMenu"]);

// auth
$routes->get('login', [LoginController::class, 'loginView']);
$routes->post('login', [LoginController::class, 'loginAct']);
$routes->get('register', [RegisterController::class, 'registerView']);
$routes->post('register', [RegisterController::class, 'registerAct']);
$routes->get('forgot-password', [MagicLinkController::class, 'forgotPasswordView']);
$routes->post('forgot-password', [MagicLinkController::class, 'forgetAct']);
// oauth
$routes->group('oauth', static function ($routes): void {
    $routes->addPlaceholder('allOAuthList', service('ShieldOAuth')->allOAuth());
    $routes->get('(:allOAuthList)', [OAuthController::class, 'redirectOAuth/$1']);

    $routes->get(config('ShieldOAuthConfig')->call_back_route, [OAuthController::class, 'callBack']);
});

// admin
$routes->group('admin', ['filter' => 'own-group:admin'], static function ($routes) {
    $routes->group('canteen', static function ($routes) {
        $routes->get('create', [AdminCanteenController::class, 'new']);
        $routes->post('', [AdminCanteenController::class, 'create']);
        $routes->get('', [AdminCanteenController::class, 'index']);
        $routes->delete('(:num)', [AdminCanteenController::class, 'delete/$1']);
    });
});

// canteenseller
$routes->group('canteen', ['filter' => 'own-group:canteenseller'], static function ($routes) {
    $routes->group('menu', static function ($routes) {
        $routes->get('create', [SellerCanteenController::class, 'new']);
        $routes->post('', [SellerCanteenController::class, 'create']);
        $routes->get('type', [SellerCanteenController::class, 'menuType']);
        $routes->get('categories', [SellerCanteenController::class, 'menuCategories']);
        $routes->get('', [SellerCanteenController::class, 'index']);
    });
});


if (service('auth')->loggedIn()) {
    if (auth()->user()->inGroup('superadmin')) {
        $routes->get('/dashboard', [DashboardController::class, "superAdminDashboard"], ['filter' => 'group:superadmin']);
    } elseif (auth()->user()->inGroup('canteenseller')) {
        $routes->get('/dashboard', [DashboardController::class, "sellerDashboard"], ['filter' => 'group:canteenseller']);
        $routes->get('/setup-wizzard', [SellerCanteenController::class, "wizzard"], ['filter' => 'group:canteenseller']);
        $routes->group('setup-wizzard', static function ($routes) {
            $routes->get('', [SellerCanteenController::class, "wizzard"], ['filter' => 'group:canteenseller']);
            $routes->post('', [SellerCanteenController::class, "wizzardAct"], ['filter' => 'group:canteenseller']);
        });
    } else {
        $routes->get('/dashboard', [DashboardController::class, "index"]);
    }
}

// error
$routes->group('errors', static function ($routes) {
    $routes->get('403', [ErrorsController::class, 'error403']);
    $routes->get('404', [ErrorsController::class, 'error404']);
    $routes->get('500', [ErrorsController::class, 'error500']);
    $routes->get('503', [ErrorsController::class, 'error503']);
});

$routes->group('api', static function ($routes) {
    $routes->get('provinces', [LocationController::class, 'listAllProvinces']);
    $routes->get('regencies/(:num)', [LocationController::class, 'listAllRegencies/$1']);
    $routes->get('districts/(:num)', [LocationController::class, 'listAllDistricts/$1']);
    $routes->get('urbans/(:num)', [LocationController::class, 'listAllUrbans/$1']);
});

// getProfile
// $routes->get('profile-picture', [ProfileController::class, 'getProfilePicture']);
service('auth')->routes($routes, ['except' => ['login', 'register', 'login/magic-link',]]);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// etc
$routes->get('mikhmon', [MikhmonController::class, 'printMikhmon']);
$routes->get('telegram', [TelegramController::class, 'index']);
