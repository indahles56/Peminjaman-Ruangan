<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('');
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
$routes->get('/', 'Admin\AuthController::login');
$routes->get('admin/register', 'Admin\AuthController::register');
$routes->post('admin/register', 'Admin\AuthController::register');
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/login', 'Admin\AuthController::login');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('logout', 'Admin\AuthController::logout');
    $routes->get('kelolaBooking', 'Admin\KelolaBooking::delete');
    $routes->get('kelolaBooking', 'Admin\KelolaBooking::get');
    $routes->get('kelolaBooking', 'Admin\KelolaBooking::update');
    $routes->get('kelolaRuang', 'Admin\KelolaRuang::delete');
    $routes->get('kelolaRuang', 'Admin\KelolaRuang::get');
    $routes->get('kelolaRuang', 'Admin\KelolaRuang::update');
    $routes->get('kelolaRuang', 'Admin\KelolaRuang::create');
    $routes->get('dashboard', 'Admin\Dashboard::dashboard');
    $routes->get('tentang', 'Home::tentang');
    $routes->get('daftar-ruangan', 'Home::daftarRuangan');
    $routes->get('daftar-booking', 'Home::daftarBooking');
    $routes->get('profil', 'Home::profil');
});
$routes->get('user/login', 'User\AuthController::login');
$routes->post('user/login', 'User\AuthController::login');
$routes->get('user/register', 'User\AuthController::register');
$routes->post('user/register', 'User\AuthController::register');
$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'User\UserDashboard::home');
    $routes->get('logout', 'User\AuthController::logout');
    $routes->get('kelolaBooking', 'User\KelolaBooking::delete');
    $routes->get('kelolaBooking', 'User\KelolaBooking::get');
    $routes->get('kelolaBooking', 'User\KelolaBooking::edit');
    $routes->get('kelolaBooking', 'User\KelolaBooking::create');
    $routes->get('dashboarduser', 'DashboardUser::home');
    $routes->get('dashboarduser/tentang', 'DashboardUser::tentang');
    $routes->get('dashboarduser/daftar-ruangan', 'DashboardUser::daftarRuangan');
    $routes->get('dashboarduser/daftar-booking', 'DashboardUser::daftarBooking');
    $routes->get('dashboarduser/profil', 'DashboardUser::profil');
    $routes->get('bookinguser', 'BookingUser::index');
    $routes->post('bookinguser/booking', 'BookingUser::booking');
    $routes->get('tentang', 'Home::tentang');
    $routes->get('daftar-ruangan', 'Home::daftarRuangan');
    $routes->get('daftar-booking', 'Home::daftarBooking');
    $routes->get('profil', 'Home::profil');
});




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