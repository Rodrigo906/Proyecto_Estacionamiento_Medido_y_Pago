<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolModel;


class User_controller extends BaseController
{

    protected $userModel;
    protected $rolModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->rolModel = new RolModel();
    }


    //retorna el listado de todos los usuarios del sistema
    public function index()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        $data['usuarios'] = $this->userModel->obtenerListadoUsuarios();
        echo view('usuarios/listado_usuarios', $data);
        echo view('template/footer');
    }

    //Al llamarlo mostrara el formulario de registro de usuario
    public function MostrarFormularioRegistro()
    {
        $data['roles'] = $this->rolModel->findAll();
        $data['titulo'] = "Crear usuario";
        $data['subtitulo'] = "Crea una cuenta!";
        echo view('template-form/formulario_head');
        echo view('usuarios/crear_usuario', $data);
        echo view('template-form/formulario_footer');
    }

    //tomara los datos del formulario y los guardara en la BD
    public function registrarUsuario()
    {

        /* PARA PRUEBAS
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];
        echo $valor1 ."---". $valor2;
        */
        $username = $_POST['username'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol'];

        $this->userModel->registrarUsuario(
            $username,
            $nombre,
            $apellido,
            $email,
            $dni,
            $fecha_nacimiento,
            $contraseña,
            $rol
        );
    }


    //Elimina cualquier usuario pasado por parametro
    public function eliminar($id_usuario)
    {

        $this->userModel->delete($id_usuario);
        $data['usuarios'] = $this->userModel->obtenerListadoUsuaurios();

        return view('vistas_administrador/listado_usuarios', $data);
    }

    public function formularioVehiculo()
    {
        echo view('template-form/formulario_head');
        $data['titulo'] = "Crear vehiculo";
        $data['subtitulo'] = "Registra un vehiculo!";
        echo view('vehiculo/crear_vehiculo', $data);
        echo view('template-form/formulario_footer');
    }
}
