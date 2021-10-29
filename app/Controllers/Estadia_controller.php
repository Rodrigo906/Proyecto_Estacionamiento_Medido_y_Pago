<?php

namespace App\Controllers;

use App\Models\EstadiaModel;
use App\Models\VehiculoModel;
use App\Models\ZonaModel;

class Estadia_controller extends BaseController{

    protected $estadiaModel;
    protected $zonaModel;
    protected $vehiculoModel;

    public function __construct(){

        $this->estadiaModel = new EstadiaModel();
        $this->zonaModel = new ZonaModel();
        $this->vehiculoModel = new VehiculoModel();
    }

    public function mostrarFormularioEstacionamiento(){
        $data['zonas'] = $this->zonaModel->findAll();
    }

    //Registro desde el cliente
    public function registrarEstadia (){

        //EN PROGRESO
        $id_usuario =  $_SESSION['id_usuario'];
        $id_vendedor = null;
        $id_zona = ['zona'];
        $id_vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $estado = $_POST['estado'];
        $estado_pago = $_POST['estado_pago'];
        $fecha_inicio = now();
        $fecha_fin = 'calcular';
        $precio = $_POST['precio'];


        $this->EstadiaModel->registrarEstadia(
            $id_usuario,
            $id_vendedor,
            $id_zona,
            $id_vehiculo,
            $estado,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $precio,
        );
    }


}
?>