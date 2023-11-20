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

    $routes->get('adicionar', 'UserController::adicionar', ['as' => 'back.user.create']);

    $routes->get('lista', 'UserController::index', ['as' => 'back.user.index']);

    $routes->post('ativa-inativa/(:num)', 'UserController::updateStatusUser/$1', ['as' => 'back.user.ativar']);

    $routes->post('novo', 'UserController::store', ['as' => 'back.user.store']);

    $routes->post('alterar', 'UserController::update', ['as' => 'back.user.update']);

    $routes->get('alterar/(:num)', 'UserController::edit/$1', ['as' => 'back.user.edit']);

});

$routes->group('produto', ['namespace' => 'App\Controllers\Backend'], static function ($routes) {

    $routes->get('adicionar', 'ProdutoController::create', ['as' => 'back.product.create']);

    $routes->get('lista', 'ProdutoController::index', ['as' => 'back.product.index']);


});
