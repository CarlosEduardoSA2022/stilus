<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Backend\Login::index', ['as' => 'back.login']);

$routes->post('/login', 'Backend\Login::doLogin', ['as' => 'doLogin']);

$routes->get('/logout', 'Backend\Login::doLogOut', ['as' => 'back.logOut']);

$routes->get('/home', 'Backend\Home::index', ['as' => 'back.home.index']);

// $routes->group('blog', ['namespace' => 'Acme\Blog\Controllers'], static function ($routes) {
//     $routes->get('/', 'Blog::index');
// });
