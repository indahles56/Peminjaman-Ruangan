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
$routes->get('admin/login', 'admin\AuthController::login');
$routes->post('admin/login', 'admin\AuthController::login');
$routes->get('admin/register', 'admin\AuthController::register');
$routes->post('admin/register', 'admin\AuthController::register');
$routes->group('admin', ['filter' => 'admin_auth'], static function ($routes) {
    $routes->get('dashboard', 'admin\DashboardController::index');
    $routes->get('users', 'admin\ManageUsersController::index');
    $routes->delete('users/delete/(:any)', 'admin\ManageUsersController::delete/$1');
    $routes->get('bookings', 'admin\ManageBookingsController::index');
    $routes->post('update-booking', 'admin\ManageBookingsController::update');
    $routes->get('profile', 'admin\ProfileController::index');
    $routes->post('profile/update', 'admin\ProfileController::updateProfile');
    $routes->post('profile/changepassword', 'admin\ProfileController::changePassword');
    $routes->get('rooms', 'admin\ManageRoomsController::index');
    $routes->post('add-room', 'admin\ManageRoomsController::store');
    $routes->post('rooms/update/(:any)', 'admin\ManageRoomsController::update/$1');
    $routes->get('logout', 'admin\AuthController::logout');
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
