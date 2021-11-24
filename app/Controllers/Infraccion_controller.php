<?php

namespace App\Controllers;

use App\Models\InfraccionModel;
use App\Models\ZonaModel;

class Infraccion_controller extends BaseController
{

    protected $zonaModel;
    protected $infraccionModel;

    public function __construct()
    {
        $this->zonaModel = new ZonaModel();
        $this->infraccionModel = new InfraccionModel();
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

        $vehiculo = $this->vehiculoModel->first($_POST['patente']);
        $id_vehiculo = $vehiculo['id_vehiculo'];
        $id_zona = $_POST['zona'];

        $this->infraccionModel->registrarInfraccion(
            $id_vehiculo,
            $id_zona,
            $_POST['motivo'],
            $_POST['fecha'],
            $_POST['direccion']
        );

        session()->setFlashdata('msg', 'Registrado correctamente');
        return redirect()->back();
    }

    public function mostrarListadoInfracciones()
    {
        $data['infracciones'] = $this->infraccionModel->findAll();
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        if (!empty($data['infracciones'])) {
            //form
        } else {

            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Aún no hay infracciones registradas";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }
}
