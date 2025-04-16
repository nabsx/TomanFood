<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('layout/home', 'Home::index');
$routes->get('pages/sate', 'Home::sate');
$routes->get('pages/sakuraBento', 'Home::sakuraBento');
$routes->get('head/admin', 'Home::admin');
$routes->get('pages/igaBakar', 'Home::igaBakar');
$routes->get('pages/ayamGepuk', 'Home::ayamGepuk');
$routes->get('pages/pasta', 'Home::pasta');




// Tambahkan route ini ke app/Config/Routes.php
$routes->get('/', 'Auth::index');  // Untuk menampilkan halaman login
$routes->post('auth/login', 'Auth::login'); // Untuk memproses login
$routes->get('auth/login', 'Auth::index'); // Jika diakses via GET ke auth/login
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::saveRegister');

$routes->post('order/checkout', 'OrderController::checkout');
