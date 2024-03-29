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

    private function enviarMensaje($mensaje, $tipo){
        session()->setFlashdata(
            ['msg' => $mensaje,
            'tipoMsg' => $tipo,
            ]
        );
    }

    //formulario para que el cliente estacione su vehiculo
    public function mostrarFormularioEstacionamiento()
    {

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        $data['zonas'] = $this->zonaModel->findAll();
        $data['vehiculos'] = $this->vehiculoModel->obtenerMisVehiculos(session('id_usuario'));

        if ($this->userModel->tieneVehiculos(session('id_usuario'))) {


            echo view('estadia/estacionar_vehiculo', $data);
        } else {

            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Aún no posee vehiculos registrados, por favor registre o asocie uno primero.";
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
        $id_vehiculo = $_POST['patente'];
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        if (!$this->estadiaModel->tieneEstadiaActiva($id_vehiculo, $fecha_inicio)) {

            $validation = service('validation');
            $validation->setRuleGroup('formEstacionarValidation');

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $id_usuario =  session('id_usuario');
            $fecha_fin = null;
            $id_zona = $_POST['zona'];
            $zona = $this->zonaModel->find($id_zona);
            
            
            //Se ignora la cant horas en caso de seleccionar el checkBox indefinido
            if (isset($_POST['indefinido'])) {

                //Si el horario no es null y actualmente estamos en el rango horario de la mañana
                if (isset($zona['horario_pago_mañana']) && $this->zonaModel->horaActualSeEncuentraEnRango($zona['horario_pago_mañana'], $fecha_inicio))
                {
                    list($horaMin, $horaMax) = explode("-", $zona['horario_pago_mañana']);
                    list($hora, $minutos) = explode(":", $horaMax);
                    $fecha_fin =  Time::createFromTime($hora, $minutos);

                    $diferenciaHoras = $fecha_inicio->diff($fecha_fin)->i;
                    $hora_decimal = $diferenciaHoras / 60;
                    $precio = $zona['costo_hora'] * $hora_decimal;
                }

                if(isset($zona['horario_pago_tarde']) && $this->zonaModel->horaActualSeEncuentraEnRango($zona['horario_pago_tarde'], $fecha_inicio))
                {
                    list($horaMin, $horaMax) = explode("-", $zona['horario_pago_tarde']);
                    list($hora, $minutos) = explode(":", $horaMax);
                    $fecha_fin =  Time::createFromTime($hora, $minutos);

                    $diferenciaHoras = $fecha_inicio->diff($fecha_fin)->i;
                    $hora_decimal = $diferenciaHoras / 60;
                    $precio = $zona['costo_hora'] * $hora_decimal;
                }
                $indefinido = true;

            }
            //si no es indefinido se calcula la fecha_fin
            else 
            {

                $cantHoras = $_POST['cant_horas'];
                list($hora, $minutos) = explode(":", $cantHoras);
                $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');
                $indefinido = false;
            }


            if ($this->zonaModel->esHorarioCobro($id_zona)) 
            {

                if (!isset($_POST['indefinido'])) 
                {

                    $hora_decimal = (($hora * 60) + $minutos) / 60;
                    $precio = $zona['costo_hora'] * $hora_decimal;

                    $estado_pago = $this->cuentaModel->estadoPago($precio);
                } 
                else 
                {
                    $estado_pago = "En curso";
                }
            } 
            else 
            {
                $precio = 0;
                $estado_pago = "Pagado";
            }

            $id_vendedor = null;
           
            $data = [
                'id_usuario' => $id_usuario,
                'id_vendedor' => $id_vendedor,
                'id_zona' => $id_zona,
                'id_vehiculo' => $id_vehiculo,
                'estado_pago' => $estado_pago,
                'indefinido' => $indefinido,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'precio' => $precio,
            ];
            $this->estadiaModel->save($data);

            session()->setFlashdata('msg', 'Se registró correctamente');
            return redirect()->back();
        } else {

            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Ya tiene una estadia abierta, cierrela primero.";
            echo view('template/head');
            echo view('template/sidenav');
            echo view('template/layout');
            echo view('errores/sinDatos', $data);
            echo view('template/footer');
        }
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
        $vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $id_vehiculo = $vehiculo[0]['id_vehiculo'];
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
        } else {
            $precio = 0;
        }
        $id_usuario = null;
        $estado_pago = "Pagado";

        $data = [
            'id_usuario' => $id_usuario,
            'id_vendedor' => $id_vendedor,
            'id_zona' => $id_zona,
            'id_vehiculo' => $id_vehiculo,
            'estado_pago' => $estado_pago,
            'indefinido' => false,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'precio' => $precio,
        ];
        $this->estadiaModel->save($data);

        session()->setFlashdata('msg', 'Se registró correctamente');
        return redirect()->back();
    }

    //Desestaciona un vehiculo previamente estacionado
    public function desEstacionar()
    {

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        $estadia = $this->estadiaModel->tieneEstadiaAbierta(session('id_usuario'), $estadiaAbierta);

        if ($estadiaAbierta == true) {

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
            $this->estadiaModel->terminarEstadia($estadia[0]['id_vehiculo'], new Time('now', 'America/Argentina/Buenos_Aires'), $precio, $estado_pago);

            $data['mensaje'] = "Vehiculo desEstacionado correctamente";
            echo view('errores/operacionExitosa', $data);
        } else {

            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Aún no posee vehiculos estacionados indefinidamente.";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }

    public function mostrarListadoAutosEstacionados()
    {
        $fecha_actual = new Time('now', 'America/Argentina/Buenos_Aires');
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if ($this->estadiaModel->hayVehiculosEstacionados($fecha_actual)) {
            $data['estadias'] = $this->estadiaModel->obtenerVehiculosEstacionados($fecha_actual);
            $data['titulo'] = "Listado de vehiculos estacionados";
            echo view('estadia/listado_autos_estacionados', $data);
        } else {
            $data['titulo'] = "¡Aviso!";
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
        $validation = service('validation');
        $validation->setRuleGroup('formConsultarEstadia');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $vehiculo = $this->vehiculoModel->obtenerVehiculo($_POST['patente']);
        $fecha_actual = new Time('now', 'America/Argentina/Buenos_Aires');

        if ($this->estadiaModel->tieneEstadiaActiva($vehiculo[0]['id_vehiculo'], $fecha_actual)) {
            $this->enviarMensaje("La estadia del vehiculo " . $vehiculo[0]['patente'] . " está activa.", "alert-success");
        } else {
            $this->enviarMensaje("La estadia del vehiculo " . $vehiculo[0]['patente'] . " está inactiva.", "alert-warning");
        }
        return redirect()->back();
    }

    //Consultado por el vendedor
    public function mostrarMisVentas()
    {
        $data['ventas'] = $this->estadiaModel->obtenerVentas(session('id_usuario'));
        $data['titulo'] = "Listado de ventas";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if (!empty($data['ventas'])) {
            echo view('estadia/listado_ventas', $data);
        } else {
            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "Aún no ha realizado ninguna venta";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }

    public function listadoEstadiasPendientes()
    {
        $data['estadias'] = $this->estadiaModel->obtenerEstadiasPendientes(session('id_usuario'));

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');

        if (!empty($data['estadias'])) {
            $data['titulo'] = "Estadias pendientes";
            echo view('estadia/estadias_pendientes', $data);
        } else {
            $data['titulo'] = "¡Aviso!";
            $data['mensaje'] = "No posee estadias pendientes de pago";
            echo view('errores/sinDatos', $data);
        }
        echo view('template/footer');
    }

    //En la vista se debe comprobar que lo seleccionado no exeda el saldo de la cuenta
    public function pagarEstadiaPendiente($id_estadia){
      
        $saldo = $this->cuentaModel->obtenerSaldo(session('id_cuenta'));
        $estadia = $this->estadiaModel->find($id_estadia);

        if( ($saldo - $estadia['precio']) >= 0 ){
            $this->cuentaModel->restarDineroCuenta(session('id_cuenta'), $estadia['precio']);
            $this->estadiaModel->pagarEstadia($id_estadia);
            $this->enviarMensaje("La estadia N° ".$id_estadia." fue saldada","alert-success");
        }
        else{
            $this->enviarMensaje("Saldo insuficiente","alert-danger");
        }
        return redirect()->back();
    }

    public function formularioActualizacionZona()
    {
        $data['zonas'] = $this->zonaModel->findAll();
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('zonas/actualizar_zona', $data);
        echo view('template/footer');
    }

    public function actualizarHorarioCostoZona()
    {       
        $validation = service('validation');
        $validation->setRuleGroup('formActualizarZona');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $horarioMañana = null;
        $horarioTarde = null;

        if(!isset($_POST['indfManiana']))
        {
            $horarioMañana = $_POST['horaDesdeManiana']."-".$_POST['horaHastaManiana'];
        }

        if(!isset($_POST['indfTarde']))
        {
            $horarioTarde = $_POST['horaDesdeTarde']."-".$_POST['horaHastaTarde'];
        }
        
        $data = [
            'horario_pago_mañana' => $horarioMañana,
            'horario_pago_tarde' => $horarioTarde,
            'costo_hora' => $_POST['precio'],
        ];

        $this->zonaModel->update($_POST['zona'], $data);

        session()->setFlashdata('msg', 'Datos de zona actualizados');
        return redirect()->back();
    }
}
