<?php

use App\Controllers\Artikel;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/Artikel', 'Artikel::index');
// $routes->get('Artikel/(:id)', 'Artikel::show');
$routes->get('/Artikel/(:num)', 'Artikel::show/$1', ['as' => 'artikel.show']);
$routes->post('/Artikel', 'Artikel::create');
$routes->put('/Artikel/updated/(:num)', 'Artikel::update/$1');
$routes->delete('/Artikel/delete/(:num)', 'Artikel::delete/$1');

// $routes->resource('Artikel');