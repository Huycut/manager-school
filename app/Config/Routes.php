<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::login');

$routes->get('list-sinhvien', 'SinhvienController::index');
$routes->post('/student/update', 'SinhvienController::updateStudent');
$routes->post('/student/addStudent', 'SinhvienController::addStudent');
$routes->post('/delete_student', 'SinhvienController::deleteStudent');

$routes->get('list-giaovien', 'GiaovienController::index');
$routes->post('/teachers/update', 'GiaovienController::update');
$routes->post('/teachers/addTeacher', 'GiaovienController::addTeacher');
$routes->post('deleteTeacher', 'GiaovienController::deleteTeachers');
$routes->get('list-monhoc', 'MonHocController::index');
//$routes->get('list-sinhviens/(:segment)', 'SinhvienController::search');