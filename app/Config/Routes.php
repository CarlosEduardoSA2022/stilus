<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Backend\Login::index', ['as' => 'back.login']);

$routes->post('/login', 'Backend\Login::doLogin', ['as' => 'doLogin']);

$routes->get('/logout', 'Backend\Login::doLogOut', ['as' => 'back.logOut']);

$routes->get('/home', 'Backend\Home::index', ['as' => 'back.home.index']);

$routes->group('usuario', ['namespace' => 'App\Controllers\Backend'], static function ($routes) {

    $routes->get('lista', 'UserController::index', ['as' => 'back.user.index']);

});
