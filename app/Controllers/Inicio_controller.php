<?php

namespace App\Controllers;

use App\Models\RolModel;
use App\Models\UserModel;

class Inicio_controller extends BaseController
{

    protected $userModel;
    protected $rolModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->rolModel = new RolModel();
    }

    public function index()
    {  
       echo view('inicio/login'); 
    }

    //Guarda el estado del usuario y lo redirige al home correspondiente
    public function loguear(){


        $validation = service('validation');                 
        $validation->setRuleGroup('formLoginValidation');         
       
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

       $username = $_POST['username'];

       $filas = $this->userModel->obtenerDatosUsuario($username);

       foreach ($filas as $fila){
        $id_usuario = $fila['id_usuario'];
        $id_cuenta = $fila['id_cuenta'];
        $contraseña = $fila['contraseña'];
        $rol = $this->rolModel->find($fila['id_rol']);
        }
      
       if (!empty($filas) && $_POST['contraseña'] == $contraseña){
            
            $datosLogin = [
                'id_usuario' => $id_usuario , 
                'id_cuenta' => $id_cuenta ,
                'username' => $username ,
                'rol' => $rol['nombre'],
            ]; 
            
                $session = session();
                $session->set($datosLogin);
                
                echo view('template/head');
                echo view('template/sidenav');
                echo view('template/layout');
                echo view('inicio/inicio');
                echo view('template/footer');
           
       }
       else{
        echo 'contraseña incorrecta';
        echo view('inicio/login'); 
   }
     
     
    }

    public function cerrarSesion (){

            session()->session_destroy;
            echo view('inicio/login'); 
    }   

    public function inicio(){

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('inicio/inicio');
        echo view('template/footer');
    }



}
