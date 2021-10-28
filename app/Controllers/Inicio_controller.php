<?php

namespace App\Controllers;

class Inicio_controller extends BaseController
{
    public function index()
    {
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('inicio/inicio');
        echo view('template/footer');
    }
}
