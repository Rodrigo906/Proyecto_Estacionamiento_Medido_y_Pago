<?php

namespace App\Controllers;

use App\Models\EstadiaModel;
use App\Models\VehiculoModel;
use App\Models\ZonaModel;
use CodeIgniter\I18n\Time;

class Estadia_controller extends BaseController{

    protected $estadiaModel;
    protected $zonaModel;
    protected $vehiculoModel;

    public function __construct(){

        $this->estadiaModel = new EstadiaModel();
        $this->zonaModel = new ZonaModel();
        $this->vehiculoModel = new VehiculoModel();
    }

    //formulario para que el cliente estacione su vehiculo
    public function mostrarFormularioEstacionamiento(){

        $data['zonas'] = $this->zonaModel->findAll(); 
    }

    //vista de venta de estadia por parte del vendedor
    public function mostrarFormularioVentaEstadia (){

    }

    //Registro desde el cliente
    public function registrarEstadia (){

        $validation = service('validation');                  
        $validation->setRuleGroup('formEstacionarValidation');    
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_usuario =  session('id_usuario');
        $id_vendedor = null;
        $id_zona = ['zona'];
        $id_vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $estado = $_POST['estado'];
        $estado_pago = $_POST['estado_pago'];
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        $cantHoras = $_POST['cant_horas'];
        $indefinido = $_POST['indefinido'];
        
        //indefinido seria un checbox al lado de la cant de horas. Se ignora la cant horas en caso de seleccionarlo
        if($indefinido){
            $fecha_fin = null;
        }
        else
            $fecha_fin = new Time('now +'.$cantHoras.'hours', 'America/Argentina/Buenos_Aires');

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

    /*Lo unico que cambia del anterior es que ahora solo se guarda el id del vendedor y no del usuario
    Ademas de no tener la verificacion de saldo*/
    public function VenderEstadia (){

        $validation = service('validation');                  
        $validation->setRuleGroup('formVenderEstadiaValidation');    
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_usuario =  null;
        $id_vendedor = session('id_usuario');
        $id_zona = ['zona'];
        $id_vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $estado = $_POST['estado'];
        $estado_pago = $_POST['estado_pago'];
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        $cantHoras = $_POST['cant_horas'];
        $indefinido = $_POST['indefinido'];
        if($indefinido){
            $fecha_fin = null;
        }
        else
            $fecha_fin = new Time('now +'.$cantHoras.'hours', 'America/Argentina/Buenos_Aires');

        $result = $this->zonaModel->find($id_zona);

        $this->EstadiaModel->registrarEstadia(
            $id_usuario,
            $id_vendedor,
            $id_zona,
            $id_vehiculo,
            $estado,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $result['precio'],
        );
    }





}
?>