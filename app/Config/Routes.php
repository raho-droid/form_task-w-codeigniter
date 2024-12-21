<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/product_add', 'ProductController::index');
$routes->post('product/save', 'ProductController::save');
$routes->get('products', 'ProductController::productsPage');
$routes->get('/products/edit/(:num)', 'ProductController::editPage/$1');
$routes->get('/products/delete/(:num)', 'ProductController::delete/$1');
$routes->post('products/update/(:num)', 'ProductController::updateProduct/$1');