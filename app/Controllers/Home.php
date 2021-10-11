<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        print_r("Hola..");
        print_r("Datos de prueba...");
        return view('welcome_message');
    }
}
