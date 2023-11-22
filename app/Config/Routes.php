<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->group('backoffice', ['namespace' => 'App\Controllers\Backend'], static function ($routes) {

    $routes->get('', 'Login::index', ['as' => 'back.login']);

    $routes->post('login', 'Login::doLogin', ['as' => 'doLogin']);
    
    $routes->get('logout', 'Login::doLogOut', ['as' => 'back.logOut']);
    
    $routes->get('home', 'Home::index', ['as' => 'back.home.index']);
    
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
    
        $routes->post('novo', 'ProdutoController::store', ['as' => 'back.product.store']);
    
        $routes->post('alterar', 'ProdutoController::update', ['as' => 'back.product.update']);
    
        $routes->post('ativa-inativa/(:num)', 'ProdutoController::updateStatusProduct/$1', ['as' => 'back.product.ativar']);    
    
        $routes->post('ativa-inativa-imagem/(:num)', 'ProdutoController::updateStatusProductImage/$1', ['as' => 'back.product.imagem.ativar']);    
    
        $routes->get('alterar/(:num)', 'ProdutoController::edit/$1', ['as' => 'back.product.edit']);
    });
 });
