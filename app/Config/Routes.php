<?php

namespace Config;

use App\Controllers\PostsController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Students');
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
$routes->get('/', 'Advertisements::index');
$routes->get('advt/create', 'Advertisements::create');
$routes->get('add', 'Advertisements::createPost');
$routes->post('advt/create', 'Advertisements::save');
$routes->get('post/create/(:any)', 'PostsController::add/$1');
$routes->get('post/list/(:any)', 'PostsController::getPostsListByAdvt/$1');
$routes->post('post/create', 'PostsController::insert');
$routes->get('post/departments', 'PostsController::listDeptts');
$routes->get('post/add_test/(:any)', 'PostTests::testEntry/$1');
$routes->post('post/create_test', 'PostTests::insert');
//#########################################################################
$routes->post('advt/create', 'Advertisements::add');
$routes->get('advt/list', 'Advertisements::list');
$routes->get('advt/(:num)', 'Advertisements::advtById/$1');
$routes->get('advt/test', 'Advertisements::test');

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
