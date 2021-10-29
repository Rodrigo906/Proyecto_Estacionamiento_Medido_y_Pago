<?php

namespace App\Controllers;

use App\Models\EstadiaModel;

class Estadia_controller extends BaseController{

    protected $estadiaModel;

    public function __construct(){

        $this->estadiaModel = new EstadiaModel();
    }

    public function mostrarFormularioEstacionamiento(){
       
    }
}
?>