<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');
$routes->get('dashboard', 'Dashboard::index', ['as' => 'dashboard']);
$routes->post('auth/login', 'AuthController::login');
$routes->get('auth/logout', 'AuthController::logout');

$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');
$routes->get('user', 'User::index');
$routes->get('user/t', 'User::tambah');
$routes->get('user/e/(:segment)', 'User::edit/$1');
$routes->get('paket', 'Paket::index');
$routes->get('paket/t', 'Paket::tambah');
$routes->get('paket/e/(:segment)', 'Paket::edit/$1');
$routes->get('jamaah', 'Jamaah::index');
$routes->get('jamaah/t', 'Jamaah::tambah');
$routes->get('jamaah/e/(:segment)', 'Jamaah::edit/$1');

// API
$routes->resource('apiusers');
$routes->resource('apiperusahaan');
$routes->resource('apipaket');
$routes->resource('apijamaah');
// update
$routes->post('apiusers/(:num)', 'ApiUsers::update/$1'); //update data users
$routes->post('upass/(:num)', 'ApiUsers::uppass/$1'); //ubah password in profile page
$routes->post('apiperusahaan/(:num)', 'ApiPerusahaan::update/$1'); //update data perusahaan
$routes->post('apipaket/(:num)', 'ApiPaket::update/$1'); //update data paket
$routes->post('apijamaah/(:num)', 'ApiJamaah::update/$1'); //update data jamaah

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
