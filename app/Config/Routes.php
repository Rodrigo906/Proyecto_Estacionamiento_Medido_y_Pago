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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Inicio_controller::index');
$routes->get('cerrar-sesion', 'Inicio_controller::cerrarSesion');
$routes->get('inicio', 'Inicio_controller::inicio');
$routes->post('loguearme', 'Inicio_controller::loguear');

$routes->get('formulario-recuperacion', 'User_controller::mostrarFormularioRecuperacion');
$routes->post('recuperar-contrasenia', 'User_controller::recuperarContraseña');

$routes->get('registrarme', 'User_controller::MostrarFormularioRegistro');
$routes->post('registrar-nuevo-cliente', 'User_controller::registrarUsuario');

$routes->get('actualizar-usuario/(:num)', 'User_controller::mostrarFormularioActualizacion/$1');
$routes->post('actualizar-usuario', 'User_controller::actualizarInformacionPersonal');


/* Aqui se definen las rutas a las cuales tiene acceso cada rol*/

//ADMINISTRADOR
$routes->group('/', ['filter' => 'Filter_permisos:Administrador'], function ($routes) {

    $routes->get('listado-usuarios', 'User_controller::index');

    $routes->get('alta-usuario', 'User_controller::mostrarFormularioAltaUsuario');
    $routes->post('registrar-usuario', 'User_controller::registrarUsuario');

    $routes->get('eliminar/(:num)', 'User_controller::eliminar/$1');

    $routes->get('listar-vehiculos-estacionados', 'Estadia_controller::mostrarListadoAutosEstacionados');

    $routes->get('listar-infracciones', 'Infraccion_controller::mostrarListadoInfracciones');

    $routes->get('form-actualizar-zona', 'Estadia_controller::formularioActualizacionZona');
    $routes->post('actualizar-zona', 'Estadia_controller::actualizarHorarioCostoZona');
});



//CLIENTE
$routes->group('/', ['filter' => 'Filter_permisos:Cliente'], function ($routes) {

    $routes->get('registro-auto', 'Vehiculo_controller::formularioRegistroVehiculo');
    $routes->post('registrar-auto', 'Vehiculo_controller::registrarVehiculo');

    $routes->get('estacionar-vehiculo', 'Estadia_controller::mostrarFormularioEstacionamiento');
    $routes->post('registrar-estacionamiento', 'Estadia_controller::registrarEstadia');

    $routes->get('des_estacionar-vehiculo', 'Estadia_controller::desEstacionar');

    $routes->get('mostrar-asociar-auto', 'Vehiculo_controller::mostrarFormAsociacion');
    $routes->post('asociar-auto', 'Vehiculo_controller::asociarVehiculo');

    $routes->get('form-cargar-saldo', 'User_controller::formularioCargarSaldo');
    $routes->post('cargar-saldo', 'User_controller::cargarSaldo');

    $routes->get('listar-estadias-pendientes', 'Estadia_controller::listadoEstadiasPendientes');
    $routes->get('pagar-estadia-pendiente/(:num)', 'Estadia_controller::pagarEstadiaPendiente/$1');

    $routes->get('mostrar-puntos-venta', 'User_controller::mostrarPuntosVenta');

});

//VENDEDOR
$routes->group('/', ['filter' => 'Filter_permisos:Vendedor'], function ($routes) {

    $routes->get('formulario-venta', 'Estadia_controller::mostrarFormularioVentaEstadia');
    $routes->post('registrar-venta', 'Estadia_controller::venderEstadia');

    $routes->get('listar-ventas', 'Estadia_controller::mostrarMisVentas');

});

//INSPECTOR
$routes->group('/', ['filter' => 'Filter_permisos:Inspector'], function ($routes) {

    $routes->get(
        'consultar-estadia',
        'Estadia_controller::mostrarConsultaEstadia'
    );
    $routes->post(
        'estado-estadia',
        'Estadia_controller::consultarEstadoEstadia'
    );
    $routes->get(
        'form-infraccion',
        'Infraccion_controller::mostrarFormularioInfraccion'
    );
    $routes->post(
        'alta-infraccion',
        'Infraccion_controller::registrarInfraccion'
    );



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
