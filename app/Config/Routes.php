<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth', 'Auth::verify');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/register', 'Auth::registered');
$routes->get('/auth/logout', 'Auth::logout');

$routes->post('/document', 'Document::new');

$routes->group('', ['filter' => '\App\Filters\AuthFilter'], function ($routes) {
  $routes->get('dashboard', 'Dashboard::index');

  //$routes->get('document', 'Document::index');
  //$routes->get('document/new', 'Document::new');
  $routes->get('document/active/(:num)/(:num)', 'document::active/$1/$2');
  $routes->resource('document', ['controller' => '\App\Controllers\document']);


  $routes->get('profile', 'Users::profile');
  $routes->get('profile/edit', 'Users::editProfile');
  $routes->put('profile', 'Users::updateProfile');
  $routes->get('change-password', 'Users::changePassword');
  $routes->put('change-password', 'Users::updatePassword');

  $routes->get('users/active/(:num)/(:num)', 'Users::active/$1/$2');
  $routes->resource('users', ['controller' => '\App\Controllers\Users']);
});
