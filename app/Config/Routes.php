<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User_controller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Inicio_controller::index');


/* Aqui se definen las rutas a las cuales tiene acceso cada rol*/

//ADMINISTRADOR
$routes->group('/', ['filter' => 'Filter_permisos:Administrador'], function($routes){

    $routes->get('listado-usuarios', 'User_controller::index');

    $routes->get('alta-usuario', 'User_controller::MostrarFormularioRegistro');
    $routes->post('registrar-usuario', 'User_controller::registrarUsuario');

    /* SIN IMPLEMENTAR AUN
    $routes->delete('eliminar-usuario/(:num)', 'User_controller::  ');
    $routes->get('editar-usuario', 'User_controller::  ');
    $routes->get('modificar-zona', 'Zona_controller::  ');
    $routes->get('listar-vehiculos-estacionados', 'Estadia_controller::  ');
    $routes->get('listar-multas', 'Infraccion_controller::  ');
    $routes->get('mi-perfil', 'User_controller::  ');
    $routes->get('editar-mi-perfil', 'User_controller:: ');
    */

});

//CLIENTE
$routes->group('/', ['filter' => 'Filter_permisos:Cliente'], function($routes){

    $routes->get('registrarme', 'User_controller::MostrarFormularioRegistro');
    $routes->post('registrar-cliente', 'User_controller::registrarUsuario');

    $routes->get('registro-auto', 'Vehiculo_controller::formularioRegistroVehiculo');
    $routes->post('registrar-auto', 'Vehiculo_controller::registrarVehiculo');

    $routes->get('estacionar-vehiculo', 'Estadia_controller::mostrarFormularioEstacionamiento');
    $routes->post('registrar-estacionamiento', 'Estadia_controller::registrarEstadia');
    $routes->get('des_estacionar-vehiculo', 'Estadia_controller::desEstacionar');
    
    /* SIN IMPLEMENTAR AUN
    $routes->get('cargar-saldo', 'User_controller::  ');
    $routes->get('pagar-estadias-pendientes', 'Estadia_controller::  ');
    $routes->get('mi-perfil', 'User_controller::  ');
    $routes->get('editar-mi-perfil', 'User_controller:: ');
    */

});

//VENDEDOR
$routes->group('/', ['filter' => 'Filter_permisos:Vendedor'], function($routes){

    $routes->get('formulario-venta', 'Estadia_controller::mostrarFormularioVentaEstadia');
    $routes->post('registrar-venta', 'Estadia_controller::registrarEstadia');

    /* SIN IMPLEMENTAR AUN
    $routes->get('listar-ventas', 'Estadia_controller::  ');
    $routes->get('mi-perfil', 'User_controller::  ');
    $routes->get('editar-mi-perfil', 'User_controller:: ');
    */


});

//INSPECTOR
$routes->group('/', ['filter' => 'Filter_permisos:Inspector'], function($routes){
    
      /* SIN IMPLEMENTAR AUN
    $routes->get('consultar-estacionamiento', 'Vehiculo_controller::  ');
    $routes->get('alta-infraccion', 'Infraccion_controller::  ');
    $routes->get('mi-perfil', 'User_controller::  ');
    $routes->get('editar-mi-perfil', 'User_controller:: ');
    */
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
