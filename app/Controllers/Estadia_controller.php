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
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        $data['zonas'] = $this->zonaModel->findAll();
        $data['vehiculos'] = $this->vehiculoModel->findAll();
        echo view('estadia/estacionar_vehiculo', $data);
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
        $vehiculo = $this->vehiculoModel->first($_POST['patente']);
        $id_vehiculo = $vehiculo['id_vehiculo'];
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');
        $estado = "Activa";

        $cantHoras = $_POST['cant_horas'];
        list($hora, $minutos) = explode(":", $cantHoras);

        /*$indefinido = $_POST['indefinido'];
        indefinido seria un checbox al lado de la cant de horas. Se ignora la cant horas en caso de seleccionarlo
        if ($indefinido = "on") {
            $fecha_fin = null;
        } else {
            $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');
        }*/
        
       // $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');

        $fecha_fin = null;
    
        $id_zona = $_POST['zona'];

        if ($this->zonaModel->esHorarioCobro($id_zona)) {
            $zona = $this->zonaModel->find($id_zona);

            $hora_decimal = (($hora * 60) + $minutos) /60;
            $precio = $zona['costo_hora'] * $hora_decimal;
            
            $estado_pago = $this->cuentaModel->estadoPago($precio);
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
            $estado,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $precio,
        );

        session()->set(['estadia' => $id_vehiculo]);

        $mensajeExito = [
        'exito' => 'Registrado correctamente',
        'tipo' => 'alert',
        ];

        return redirect()->back()->withInput()->with('mensajes', $mensajeExito);
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
        $estado = "Activa";
        $estado_pago = "Pagado";
        $fecha_inicio = new Time('now', 'America/Argentina/Buenos_Aires');

        $cantHoras = $_POST['cant_horas'];
        list($hora, $minutos) = explode(":", $cantHoras);

        $fecha_fin = new Time('now +' . $hora . 'hours' . $minutos . 'minutes', 'America/Argentina/Buenos_Aires');
        $id_zona = $_POST['zona'];
        if ($this->zonaModel->esHorarioCobro($id_zona)) {

            $zona = $this->zonaModel->find($id_zona);
          
            $hora_decimal = (($hora * 60) + $minutos) /60;
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
            $estado,
            $estado_pago,
            $fecha_inicio,
            $fecha_fin,
            $precio,
        );

        $mensajeExito = [
            'exito' => 'Registrado correctamente',
            'tipo' => 'alert',
            ];
        return redirect()->back()->withInput()->with('mensajes', $mensajeExito);
    }

    //Desestaciona un vehiculo previamente estacionado
    public function desEstacionar()
    {
        
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        
        if (session('estadia') != null) { 
            $this->estadiaModel->terminarEstadia(session('estadia'), new Time('now', 'America/Argentina/Buenos_Aires'));
            session()->remove('estadia');
            $data['mensaje'] = "Vehiculo desEstacionado correctamente";
            echo view('errores/operacionExitosa', $data);
           
        }
        else{
            $data['mensaje'] = "Debe estacionar un auto con anterioridad";
            echo view('errores/accesoRestringido', $data);
          
        }
        echo view('template/footer');
    }
}
