<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('TaskController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

use App\Controllers\TaskController;

$routes->get('/', [TaskController::class, 'index']);
$routes->get('/tasks', [TaskController::class, 'tasks']);
$routes->get('/profile', [TaskController::class, 'profile']);
$routes->get('/about', [TaskController::class, 'about']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');
$routes->get('logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('tasks/new', 'TaskController::new');
    $routes->post('tasks/create', 'TaskController::create');
    $routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
    $routes->post('tasks/update/(:num)', 'TaskController::update/$1');
    $routes->get('tasks/delete/(:num)', 'TaskController::delete/$1'); // Soft delete
});