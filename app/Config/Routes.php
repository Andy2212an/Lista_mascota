<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas: MASCOTAS
$routes->get('/mascotas', 'MascotaController::listar');
$routes->get('/mascotas/listar', 'MascotaController::listar');
$routes->get('/mascotas/crear', 'MascotaController::crear');
$routes->get('/mascotas/editar/(:num)', 'MascotaController::editar/$1');

$routes->post('/mascotas/guardar', 'MascotaController::guardar');
$routes->post('/mascotas/actualizar', 'MascotaController::actualizar');

$routes->get('/mascotas/borrar/(:num)', 'MascotaController::borrar/$1');

$routes->get('/mascotas/perfil', 'MascotaController::perfil');

