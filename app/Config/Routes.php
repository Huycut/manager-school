<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::login');
$routes->get('list-sinhvien', 'SinhvienController::index');
$routes->get('list-giaovien', 'GiaovienController::index');
$routes->get('list-monhoc', 'MonHocController::index');
//$routes->get('list-sinhviens/(:segment)', 'SinhvienController::search');