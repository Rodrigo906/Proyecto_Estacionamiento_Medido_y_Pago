<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        print_r("Hola..");
        return view('welcome_message');
    }
}
