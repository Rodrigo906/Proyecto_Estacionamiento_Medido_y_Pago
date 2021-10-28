<?php

namespace App\Controllers;
use App\Models\VehiculoModel;


class Vehiculo_controller extends BaseController
{
    protected $vehiculoModel;

    public function __construct()
    {
        $this->vehiculoModel = new VehiculoModel();
        
    }
}

?>