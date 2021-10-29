<?php

namespace App\Controllers;

use App\Models\UserModel;

class Inicio_controller extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {  
       echo view('template/head');
       echo view('inicio/login'); 
    }

    //Falta mejorar
    public function loguear(){
        
       $username = $_POST['username'];

       $filas = $this->userModel->obtenerDatosUsuario($username);

       foreach ($filas as $fila){
            $id_usuario = $fila['id_usuario'];
            $id_cuenta = $fila['id_cuenta'];
            $contraseña = $fila['contraseña'];
       }
      
       if ($_POST['contraseña'] == $contraseña){
            $datosLogin = [
                'id_usuario' => $id_usuario , 
                'id_cuenta' => $id_cuenta ,
                'username' => $username ,
            ]; 
            
                $session = session();
                $session->set($datosLogin);
                // Usar $session->destroy(); para destruir la sesion
                echo view('template/head');
                echo view('template/sidenav');
                echo view('template/layout');
                echo view('inicio/inicio');
                echo view('template/footer');
           
       }
       else{
            echo 'contraseña incorrecta';
            echo view('template/head');
            echo view('inicio/login');
       }
     
    }

    public function inicio(){

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('inicio/inicio');
        echo view('template/footer');
    }

}
