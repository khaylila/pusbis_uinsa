<?php

namespace Config;

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Api\LocationController;
use App\Controllers\Auth\OAuthController;
use App\Controllers\DashboardController;

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

// auth
$routes->get('login', [LoginController::class, 'loginView']);
$routes->post('login', [LoginController::class, 'loginAct']);
$routes->get('register', [RegisterController::class, 'registerView']);
$routes->post('register', [RegisterController::class, 'registerAct']);

$routes->group('oauth', static function ($routes): void {
    $routes->addPlaceholder('allOAuthList', service('ShieldOAuth')->allOAuth());
    $routes->get('(:allOAuthList)', [OAuthController::class, 'redirectOAuth/$1']);

    $routes->get(config('ShieldOAuthConfig')->call_back_route, [OAuthController::class, 'callBack']);
});

$routes->get('/', 'Home::index');
$routes->get('/dashboard', [DashboardController::class, "index"]);

$routes->group('api', static function ($routes) {
    $routes->get('provinces', [LocationController::class, 'listAllProvinces']);
    $routes->get('regencies/(:num)', [LocationController::class, 'listAllRegencies/$1']);
    $routes->get('districts/(:num)', [LocationController::class, 'listAllDistricts/$1']);
    $routes->get('urbans/(:num)', [LocationController::class, 'listAllUrbans/$1']);
});

service('auth')->routes($routes, ['except' => ['login', 'register']]);

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
