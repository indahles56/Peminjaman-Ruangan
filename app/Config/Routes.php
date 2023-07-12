<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\\');
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
$routes->get('/', 'User\DashboardController::index', ['filter' => 'user_auth']);
$routes->get('login', 'User\UserAuthController::login');
$routes->post('login', 'User\UserAuthController::login');
$routes->get('register', 'User\UserAuthController::register');
$routes->post('register', 'User\UserAuthController::register');
$routes->group('user', ['filter' => 'user_auth'], static function ($routes) {
    $routes->get('dashboard', 'User\DashboardController::index');
    $routes->get('rooms', 'User\RoomsController::index');
    $routes->get('bookings', 'User\BookingController::index');
    $routes->post('process-booking', 'User\BookingController::book');
    $routes->post('cancel-booking', 'User\BookingController::cancel');
    $routes->group('profile', static function ($routes) {
        $routes->get('/', 'User\ProfileController::index');
        $routes->post('update', 'User\ProfileController::updateProfile');
        $routes->post('changepassword', 'User\ProfileController::changePassword');
    });
    $routes->get('logout', 'User\AuthController::logout');
});

/* 
    Admin Section
 */
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/login', 'Admin\AuthController::login');
$routes->get('admin/register', 'Admin\AuthController::register');
$routes->post('admin/register', 'Admin\AuthController::register');
$routes->group('admin', ['filter' => 'admin_auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('users', 'Admin\ManageUsersController::index');
    $routes->delete('users/delete/(:any)', 'Admin\ManageUsersController::delete/$1');
    $routes->get('bookings', 'Admin\ManageBookingsController::index');
    $routes->post('update-booking', 'Admin\ManageBookingsController::update');
    $routes->get('profile', 'Admin\ProfileController::index');
    $routes->post('profile/update', 'Admin\ProfileController::updateProfile');
    $routes->post('profile/changepassword', 'Admin\ProfileController::changePassword');
    $routes->get('rooms', 'Admin\ManageRoomsController::index');
    $routes->post('add-room', 'Admin\ManageRoomsController::store');
    $routes->post('rooms/update/(:any)', 'Admin\ManageRoomsController::update/$1');
    $routes->get('logout', 'Admin\AuthController::logout');
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
