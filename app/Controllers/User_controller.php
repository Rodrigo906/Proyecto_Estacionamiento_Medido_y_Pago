<?php

namespace App\Controllers;

use App\Models\CuentaModel;
use App\Models\PuntoVentaModel;
use App\Models\UserModel;
use App\Models\RolModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User_controller extends BaseController
{

    protected $userModel;
    protected $rolModel;
    protected $cuentaModel;
    protected $puntoVentaModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->rolModel = new RolModel();
        $this->cuentaModel = new CuentaModel();
        $this->puntoVentaModel = new PuntoVentaModel();
    }

    //retorna el listado de todos los usuarios del sistema
    public function index()
    {
        $data['usuarios'] = $this->userModel->obtenerListadoUsuarios();
        $data['titulo'] = "Listado de usuarios";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('usuarios/listado_usuarios', $data);
        echo view('template/footer');
    }

    //Al llamarlo mostrara el formulario de registro de cliente
    public function MostrarFormularioRegistro()
    {

        $data['titulo'] = "Crear usuario";
        $data['subtitulo'] = "¡Registrate!";

        echo view('template/head');
        echo view('usuarios/crear_usuario_cliente', $data);
        echo view('template/footer');
    }

    //La que usa el administrador
    public function mostrarFormularioAltaUsuario()
    {

        $data['titulo'] = "Crear usuario";
        $data['subtitulo'] = "Registrar usuario";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        $data['roles'] = $this->rolModel->findAll();
        echo view('usuarios/crear_usuario', $data);
        echo view('template/footer');
    }

    public function registrarUsuario()
    {
        $validation = service('validation');                  //inicializo la libreria de validacion
        $validation->setRuleGroup('formUsuarioValidation');          //establesco con que reglas se debe validar el formulario

        /*si hubo algun error redirecciono de nuevo al usuario al formulario con los datos que eran correctos y
        marcando los errores*/
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $_POST['username'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];
        if (isset($_POST['rol'])) {
            $id_rol = $_POST['rol'];
        } else {
            $rol = $this->rolModel->obtenerIdRol("Cliente");
            $id_rol = $rol[0]['id_rol'];
        }
       
        $data = [
            'id_rol' => $id_rol,
            'username' => $username,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'dni' => $dni,
            'fecha_nacimiento' => $fecha_nacimiento,
            'contraseña' => $contraseña,
        ];

        $this->userModel->save($data);

        session()->setFlashdata('msg', 'Se registró correctamente');
        return redirect()->back();
    }


    //AGREGADO EN SPRINT 2

    public function mostrarFormularioActualizacion($id_usuario)
    {
        //si no es administrador no puede acceder a la informacion de otro usuario, solo a la suya
        if (session('rol') != "Administrador" && session('id_usuario') != $id_usuario) {
            throw PagenotFoundException::forPageNotFound();
        }

        $data['titulo'] = "Editar usuario";
        $data['subtitulo'] = "Editar usuario";

        $data['usuario'] = $this->userModel->find($id_usuario);
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('usuarios/editar_usuario', $data);
        echo view('template/footer');
    }

    public function actualizarInformacionPersonal()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formActualizacionValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];

        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'fecha_nacimiento' => $fecha_nacimiento,
            'contraseña' => $contraseña,
        ];

        $this->userModel->update($_POST['id_usuario'], $data);

        session()->setFlashdata('msg', 'Se actualizaron sus datos correctamente');
        return redirect()->back();
    }

    public function mostrarFormularioRecuperacion()
    {
        echo view('template/head');
        echo view('inicio/recuperar_contraseña');
        echo view('template/footer');
    }

    public function recuperarContraseña()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formRestablecerContraseñaValidation');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        //Aqui se deberia enviar un mail al usuario
        $this->userModel->restablecerContraseña($_POST['username']);
        session()->setFlashdata('msg', 'Se restableció su contraseña correctamente. Su nueva contaseña es: "1234".');
        return redirect()->back();
    }

    //Elimina cualquier usuario pasado por parametro
    public function eliminar($id_usuario)
    {
        $this->userModel->eliminarUsuario($id_usuario);

        session()->setFlashdata('msg', 'El usuario se eliminó correctamente.');
        return redirect()->back();
    }

    //Sprint 3

    public function formularioCargarSaldo()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        $data['subtitulo'] = "Cargar saldo";
        echo view('usuarios/cargar_saldo', $data);
        echo view('template/footer');
    }

    public function cargarSaldo()
    {

        $validation = service('validation');
        $validation->setRuleGroup('formCargarSaldo');

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        //Aqui se deberia Validar la tarjeta
        
        $monto = $_POST['monto'];

        $this->cuentaModel->cargarDineroCuenta(session('id_cuenta'), $monto);


        session()->setFlashdata('msg', "Su carga de $$monto fue exitosa");
        return redirect()->back();
    }

    public function mostrarPuntosVenta (){
        $data['puntos_venta'] = $this->puntoVentaModel->obtenerPuntosVenta();
        $data['subtitulo'] = "Puntos de venta";
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('zonas/listado_puntos_venta', $data);
        echo view('template/footer');
    }
}
