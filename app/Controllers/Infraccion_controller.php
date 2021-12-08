<?php

namespace App\Controllers;

use App\Models\InfraccionModel;
use App\Models\VehiculoModel;
use App\Models\ZonaModel;

class Infraccion_controller extends BaseController
{

    protected $zonaModel;
    protected $infraccionModel;
    protected $vehiculoModel;

    public function __construct()
    {
        $this->zonaModel = new ZonaModel();
        $this->infraccionModel = new InfraccionModel();
        $this->vehiculoModel = new VehiculoModel();
    }

    public function mostrarFormularioInfraccion()
    {
        $data['zonas'] = $this->zonaModel->findAll();
        $data['subtitulo'] = "Registrar infración";
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('infraccion/infraccion', $data);
        echo view('template/footer');
    }

    public function registrarInfraccion()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formRegistrarInfraccion');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
    
        $data = [
            'id_vehiculo' => $vehiculo[0]['id_vehiculo'],
            'id_zona' => $_POST['zona'],
            'motivo' => $_POST['motivo'],
            'fecha' => $_POST['fecha'],
            'direccion' => $_POST['direccion'],
        ];
        $this->infraccionModel->save($data);

        session()->setFlashdata('msg', 'Registrado correctamente');
        return redirect()->back();
    }

    public function mostrarListadoInfracciones()
    {
        $data['infracciones'] = $this->infraccionModel->obtenerInfracciones();
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        if (!empty($data['infracciones'])) {
            echo view('infraccion/listar_infracciones', $data);
        } else {

            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Aún no hay infracciones registradas";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }
}
