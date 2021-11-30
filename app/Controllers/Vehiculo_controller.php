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

    private function enviarMensaje($mensaje, $tipo){
        session()->setFlashdata(
            ['msg' => $mensaje,
            'tipoMsg' => $tipo,
            ]
        );
    }

    //mostrara el formulario de registro
    public function formularioRegistroVehiculo()
    {

        $data['subtitulo'] = 'Registrar vehiculo';
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('vehiculo/crear_vehiculo', $data);
        echo view('template/footer');
    }

    public function registrarVehiculo()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formVehiculoValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $patente = $_POST['patente'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];

        $this->vehiculoModel->registrarVehiculo($patente, $marca, $modelo, session('id_usuario'));

        session()->setFlashdata('msg', 'Registrado correctamente');
        return redirect()->back();
    }

    public function mostrarFormAsociacion (){
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('vehiculo/asociar_vehiculo');
        echo view('template/footer');
    }
    
    public function asociarVehiculo (){

        $validation = service('validation');
        $validation->setRuleGroup('formConsultarEstadia');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $vehiculo =   $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        if ($this->vehiculoModel->asociarVehiculo(session('id_usuario'), $vehiculo[0]['id_vehiculo'])){
            $this->enviarMensaje("Vehiculo asociado correctamente", "alert-success");
        }
        else{
            $this->enviarMensaje("El vehiculo ya se encuentra asociado", "alert-warning");
        }
        return redirect()->back();
    }
}
