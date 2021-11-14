<?php

namespace App\Controllers;

use App\Models\CuentaModel;
use App\Models\EstadiaModel;
use App\Models\UserModel;
use App\Models\VehiculoModel;
use App\Models\ZonaModel;
use CodeIgniter\I18n\Time;
use DateTime;

class Estadia_controller extends BaseController
{

    protected $estadiaModel;
    protected $zonaModel;
    protected $vehiculoModel;
    protected $cuentaModel;
    protected $userModel;

    public function __construct()
    {

        $this->estadiaModel = new EstadiaModel();
        $this->zonaModel = new ZonaModel();
        $this->vehiculoModel = new VehiculoModel();
        $this->cuentaModel = new CuentaModel();
        $this->userModel = new UserModel();
    }

    //formulario para que el cliente estacione su vehiculo
    public function mostrarFormularioEstacionamiento()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if ($this->userModel->tieneVehiculos(session('id_usuario'))){
        
            $data['zonas'] = $this->zonaModel->findAll();
            $data['vehiculos'] = $this->vehiculoModel->obtenerMisVehiculos(session('id_usuario'));
            echo view('estadia/estacionar_vehiculo', $data);

        }
        else{
            $data['titulo'] ="¡Error!";
            $data['mensaje'] = "Aun no posee vehiculos registrados, por favor registre uno primero.";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }

    //vista de venta de estadia por parte del vendedor
    public function mostrarFormularioVentaEstadia()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
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
        $id_vehiculo = $_POST['patente'];
        /**Trae el id del vehiculo */
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        //indefinido seria un checbox al lado de la cant de horas. Se ignora la cant horas en caso de seleccionarlo
        if (isset($_POST['indefinido'])) {
            $fecha_fin = null;
        } else {
            $cantHoras = $_POST['cant_horas'];
            list($hora, $minutos) = explode(":", $cantHoras);
            $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');
        }

        $id_zona = $_POST['zona'];

        if ($this->zonaModel->esHorarioCobro($id_zona)) {

            if (!isset($_POST['indefinido'])) {

                $zona = $this->zonaModel->find($id_zona);

                $hora_decimal = (($hora * 60) + $minutos) / 60;
                $precio = $zona['costo_hora'] * $hora_decimal;

                $estado_pago = $this->cuentaModel->estadoPago($precio);
            } else {
                $estado_pago = "En curso";
                $precio = 0;
            }
        } else {
            $precio = 0;
            $estado_pago = "Pagado";
        }

        $id_vendedor = null;

        $this->estadiaModel->registrarEstadia(
            $id_usuario,
            $id_vendedor,
            $id_zona,
            $id_vehiculo,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $precio,
        );

        session()->set(['estadia' => $id_vehiculo]);

        session()->setFlashdata('msg', 'Se registró correctamente');
        return redirect()->back();
    }

    //Venta de estadia por parte del usuario vendedor !!
    public function venderEstadia()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formVentaEstadiaValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_vendedor = session('id_usuario');
        $vehiculo = $this->vehiculoModel->first($_POST['patente']);
        $id_vehiculo = $vehiculo['id_vehiculo'];
        $estado_pago = "Pagado";
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        $cantHoras = $_POST['cant_horas'];
        list($hora, $minutos) = explode(":", $cantHoras);

        $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');
        $id_zona = $_POST['zona'];
        if ($this->zonaModel->esHorarioCobro($id_zona)) {

            $zona = $this->zonaModel->find($id_zona);

            $hora_decimal = (($hora * 60) + $minutos) / 60;
            $precio = $zona['costo_hora'] * $hora_decimal;

            $estado_pago = $this->cuentaModel->estadoPago($precio);
        } else {
            $precio = 0;
            $estado_pago = "Pagado";
        }
        $id_usuario = null;

        $this->estadiaModel->registrarEstadia(
            $id_usuario,
            $id_vendedor,
            $id_zona,
            $id_vehiculo,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $precio,
        );

        session()->setFlashdata('msg', 'Se registró correctamente');
        return redirect()->back();
    }

    //Desestaciona un vehiculo previamente estacionado
    public function desEstacionar()
    {

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if (session('estadia') != null) {

            $estadia = $this->estadiaModel->obtenerUltimaEstadia(session('estadia'));
            $precio = 0;
            if ($estadia[0]['estado_pago'] == "En curso") {

                $fechaActual = new DateTime(new Time('now', 'America/Argentina/Buenos_Aires'));
                $fechaInicio = new DateTime($estadia[0]['fecha_inicio']);
                $diferenciaHoras = $fechaInicio->diff($fechaActual)->i;
                $hora_decimal = $diferenciaHoras / 60;
                $zona = $this->zonaModel->find($estadia[0]['id_zona']);
                $precio = $zona['costo_hora'] * $hora_decimal;
            }
            $estado_pago = $this->cuentaModel->estadoPago($precio);
            $this->estadiaModel->terminarEstadia(session('estadia'), new Time('now', 'America/Argentina/Buenos_Aires'), $precio, $estado_pago);
            session()->remove('estadia');

            $data['mensaje'] = "Vehiculo desEstacionado correctamente";
            echo view('errores/operacionExitosa', $data);
        } else {

            $data['mensaje'] = "No tiene ningun vehiculo estacionado";
            $data['volver'] = $_SERVER['HTTP_REFERER'];
            echo view('errores/accesoRestringido', $data);
        }
        echo view('template/footer');
    }

    public function mostrarListadoAutosEstacionados()
    {
        $fecha_actual = new Time('now', 'America/Argentina/Buenos_Aires');
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if($this->estadiaModel->hayVehiculosEstacionados($fecha_actual)){
            $data['estadias'] = $this->estadiaModel->obtenerVehiculosEstacionados($fecha_actual);
            $data['titulo'] = "Listado de vehiculos estacionados";
            echo view('estadia/listado_autos_estacionados', $data);
        }
        else{
            $data['titulo'] ="¡Aviso!";
            $data['mensaje'] = "No hay vehiculos estacionados en este momento";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }

    public function mostrarConsultaEstadia()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('estadia/consultar_estadia');
        echo view('template/footer');
    }

    public function consultarEstadoEstadia()
    {
        $vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $fecha_actual = new Time('now', 'America/Argentina/Buenos_Aires');

        if ($this->estadiaModel->tieneEstadiaActiva($vehiculo[0]['id_vehiculo'], $fecha_actual)) {
            session()->setFlashdata('msg', 'La estadia del vehiculo ' . $vehiculo[0]['patente'] . " está activa.");
            return redirect()->back();
            
        } else {
            session()->setFlashdata('msg', 'La estadia del vehiculo ' . $vehiculo[0]['patente'] . " está inactiva.");
            return redirect()->back();
        }
    }

    //Consultado por el vendedor
    public function mostrarMisVentas()
    {
        $data['ventas'] = $this->estadiaModel->obtenerVentas(session('id_usuario'));
        $data['titulo'] = "Listado de ventas";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if(!empty($data['ventas'])){
            echo view('estadia/listado_ventas', $data);
        }
        else{
            $data['titulo'] ="¡Aviso!";
            $data['mensaje'] = "Aun no a realizado ninguna venta";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }
}
