<?php

namespace App\Controllers;
use App\Models\RolModel;


class Rol_controller extends BaseController{

    protected $rolModel;

    public function __construct(){
        $this->rolModel = new RolModel();
    }

    public function mostrarFormulario(){
        $data['roles'] = $this->rolModel->findAll();
    }
}
?>