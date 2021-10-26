<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController{

    protected $userModel;
    
    public function __construct(){

        $this->userModel = new UserModel(); 
    }


    //retorna el listado de todos los usuarios del sistema
    public function index(){

        $data['usuarios'] = $this->userModel->obtenerListadoUsuaurios();
        return view('vistas_administrador/listado_usuarios', $data);  
    }
    
    //Elimina cualquier usuario pasado por parametro
    public function eliminar ($id_usuario){

        $this->userModel->delete($id_usuario);
        $data['usuarios'] = $this->userModel->obtenerListadoUsuaurios();

        return view('vistas_administrador/listado_usuarios', $data);  
    }
}

?>