<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('layout/home', 'Home::restoran');
$routes->get('pages/sate', 'Home::sate');
$routes->get('pages/sakuraBento', 'Home::sakuraBento');
$routes->get('head/admin', 'Home::admin');
$routes->get('pages/igaBakar', 'Home::igaBakar');
$routes->get('pages/ayamGepuk', 'Home::ayamGepuk');
$routes->get('pages/pasta', 'Home::pasta');




// Tambahkan route ini ke app/Config/Routes.php
$routes->get('auth/login', 'Auth::index');    // Untuk menampilkan halaman login
$routes->post('auth/login', 'Auth::login'); // Untuk memproses login
$routes->get('auth/login', 'Auth::index'); // Jika diakses via GET ke auth/login
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::saveRegister');

$routes->post('order/checkout', 'OrderController::checkout');

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin::index');
    
    // Restaurant routes
    $routes->get('restaurants', 'Admin::restaurants');
    $routes->get('add-restaurant', 'Admin::addRestaurant');
    $routes->post('add-restaurant', 'Admin::addRestaurant');
    $routes->get('edit-restaurant/(:num)', 'Admin::editRestaurant/$1');
    $routes->post('edit-restaurant/(:num)', 'Admin::editRestaurant/$1');
    $routes->get('delete-restaurant/(:num)', 'Admin::deleteRestaurant/$1');
    
    // Menu routes
    $routes->get('menus', 'Admin::menus');
    $routes->get('menus/(:num)', 'Admin::menus/$1');
    $routes->get('add-menu', 'Admin::addMenu');
    $routes->post('add-menu', 'Admin::addMenu');
    $routes->get('edit-menu/(:num)', 'Admin::editMenu/$1');
    $routes->post('edit-menu/(:num)', 'Admin::editMenu/$1');
    $routes->get('delete-menu/(:num)', 'Admin::deleteMenu/$1');
    
    // Order routes
    $routes->get('orders', 'Admin::orders');
    $routes->get('order-detail/(:num)', 'Admin::orderDetail/$1');
});
