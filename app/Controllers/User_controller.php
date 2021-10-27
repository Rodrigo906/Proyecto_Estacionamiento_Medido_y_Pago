<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RolModel;


class User_controller extends BaseController{

    protected $userModel;
    protected $rolModel;
    
    public function __construct(){

        $this->userModel = new UserModel();
        $this->rolModel = new RolModel();
    }


    //retorna el listado de todos los usuarios del sistema
    public function index(){

        $data['usuarios'] = $this->userModel->obtenerListadoUsuaurios();
        return view('vistas_administrador/listado_usuarios', $data);  
    }

    //Al llamarlo mostrara el formulario de registro de usuario
    public function MostrarFormularioRegistro (){
        return view('vistas_administrador/formulario_registro_usuario');
    }

    //tomara los datos del formulario y los guardara en la BD
    public function registrarUsuario(){
        
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
        $rol = $this->rolModel->find($_POST['rol']);

        $this->userModel->registrarUsuario($username, $nombre, $apellido, $email, $dni, 
                                                    $fecha_nacimiento, $contraseña, $rol);
                                                
    }

    
    //Elimina cualquier usuario pasado por parametro
    public function eliminar ($id_usuario){

        $this->userModel->delete($id_usuario);
        $data['usuarios'] = $this->userModel->obtenerListadoUsuaurios();

        return view('vistas_administrador/listado_usuarios', $data);  
    }
}

?>