<?php

namespace App\Controllers;

use App\Models\VehiculoModel;



class Vehiculo_controller extends BaseController
{
    protected $vehiculoModel;

    public function __construct()
    {
        $this->vehiculoModel = new VehiculoModel();
    }

    public function index(){

    }

    //mostrara el formulario de registro
    public function formularioRegistroVehiculo(){

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('');
        echo view('template/footer');
    }

    public function registrarVehiculo(){     

        $validation = service('validation');                  
        $validation->setRuleGroup('formVehiculoValidation');    
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $patente = $_POST['patente'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        
        $this->vehiculoModel->registrarVehiculo($patente, $_SESSION['id_usuario'], $marca, $modelo);
    }

}

?>