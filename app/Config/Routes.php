<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Tasks::today');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'Pages::about');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('tasks/new', 'Tasks::create');
$routes->post('tasks', 'Tasks::store');

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('tasks/update/(:num)', 'Tasks::update/$1');
$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1');
