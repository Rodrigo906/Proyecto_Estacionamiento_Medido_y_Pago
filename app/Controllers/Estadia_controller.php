<?php

namespace App\Controllers;

use App\Models\CuentaModel;
use App\Models\EstadiaModel;
use App\Models\VehiculoModel;
use App\Models\ZonaModel;
use CodeIgniter\I18n\Time;

class Estadia_controller extends BaseController
{

    protected $estadiaModel;
    protected $zonaModel;
    protected $vehiculoModel;
    protected $cuentaModel;

    public function __construct()
    {

        $this->estadiaModel = new EstadiaModel();
        $this->zonaModel = new ZonaModel();
        $this->vehiculoModel = new VehiculoModel();
        $this->cuentaModel = new CuentaModel();
    }

    //formulario para que el cliente estacione su vehiculo
    public function mostrarFormularioEstacionamiento()
    {

        $data['zonas'] = $this->zonaModel->findAll();
    }

    //vista de venta de estadia por parte del vendedor
    public function mostrarFormularioVentaEstadia()
    {
        echo view('template/head');
        $data['zonas'] = $this->zonaModel->findAll();
        echo view('estadia/venta_estadia', $data);
        echo view('template/footer');
    }

    //Registro desde el cliente
    public function registrarEstadia()
    {

        $validation = service('validation');
        $validation->setRuleGroup('formEstacionarValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_usuario =  session('id_usuario');
        $id_vendedor = null;
        $id_vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');
        $estado = "Activa";
        $cantHoras = $_POST['cant_horas'];
        $indefinido = $_POST['indefinido'];

        //indefinido seria un checbox al lado de la cant de horas. Se ignora la cant horas en caso de seleccionarlo
        if ($indefinido) {
            $fecha_fin = null;
        } else {
            $fecha_fin = new Time('now +' . $cantHoras . 'hours', 'America/Argentina/Buenos_Aires');
        }

        $id_zona = $_POST['zona'];

        if ($this->zonaModel->esHorarioCobro($id_zona)) {
            $zona = $this->zonaModel->find($id_zona);
            $precio = $zona[0]['precio'];
            $estado_pago = $this->cuentaModel->estadoPago($precio);
        } else {
            $precio = 0;
            $estado_pago = "Pagado";
        }

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

        session()->set(['estadia' => 'id_vehiculo']);
    }

    /*Lo unico que cambia del anterior es que ahora solo se guarda el id del vendedor y no del usuario
    Ademas de no tener la verificacion de saldo
    Venta de estadia por parte del usuario vendedor !!
    */
    public function venderEstadia()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formVentaEstadiaValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_usuario =  null;
        $id_vendedor = session('id_usuario');
        $vehiculo = $this->vehiculoModel->first($_POST['patente']);
        $id_vehiculo = $vehiculo['id_vehiculo'];
        $estado = "Activa";
        $estado_pago = "Pagado";
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');
        $cantHoras = $_POST['cant_horas'];

        if ($_POST['indefinido'] == 'on') {
            $fecha_fin = null;
        } else {
            $fecha_fin = new Time('now +' . $cantHoras . 'hours', 'America/Argentina/Buenos_Aires');
        }
        $id_zona = $_POST['zona'];
        if ($this->zonaModel->esHorarioCobro($id_zona)) {

            $zona = $this->zonaModel->find($id_zona);
            $precio = $zona[0]['precio'];
            $estado_pago = $this->cuentaModel->estadoPago($precio);
        } else {
            $precio = 0;
            $estado_pago = "Pagado";
        }

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

    public function desEstacionar()
    {

        if (session('id_vehiculo') != null) {
            $this->estadiaModel->terminarEstadia(session('id_vehiculo'), new Time('now', 'America/Argentina/Buenos_Aires'));
            session()->remove('id_vehiculo');
        }
    }
}
