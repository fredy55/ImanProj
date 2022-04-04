<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// $routes->resource('articles');

// Equivalent to the following:
// $routes->get('articles/new',             'Articles::new');
// $routes->post('articles',                'Articles::create');
// $routes->get('articles',                 'Articles::index');
// $routes->get('articles/(:segment)',      'Articles::show/$1');
// $routes->get('articles/(:segment)/edit', 'Articles::edit/$1');
// $routes->put('articles/(:segment)',      'Articles::update/$1');
// $routes->patch('articles/(:segment)',    'Articles::update/$1');
// $routes->delete('articles/(:segment)',   'Articles::delete/$1');

//URLS FOR POST ARTICLES
$routes->get('articles','Articles::index');
$routes->get('articles/(:segment)','Articles::show/$1');
$routes->post('articles/create', 'Articles::create');
$routes->post('articles/update', 'Articles::update');
$routes->get('articles/delete/(:segment)','Articles::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
