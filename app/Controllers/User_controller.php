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
    public function index(){

        $data['usuarios'] = $this->userModel->obtenerListadoUsuarios();
        $data['titulo'] = "Listado de usuarios";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('usuarios/listado_usuarios', $data);  
        echo view('template/footer');
        
    }

    //Al llamarlo mostrara el formulario de registro de usuario
    public function MostrarFormularioRegistro (){

        $data['roles'] = $this->rolModel->findAll();
        $data['titulo'] = "Registrar usuario";
        return view('vistas_administrador/formulario_registro_usuario', $data);
    }

    //tomara los datos del formulario y los guardara en la BD
    public function registrarUsuario(){
        
        $validation = service('validation');                  //inicializo la libreria de validacion
        $validation->setRuleGroup('formValidation');          //establesco con que reglas se debe validar el formulario
        
        /*si hubo algun error redirecciono de nuevo al usuario al formulario con los datos que eran correctos y
        marcando los errores*/
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $_POST['username'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];
        $rol = $this->rolModel->find($_POST['rol']);

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
}
