<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filter_is_login implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('estaLogueado')) {
            return redirect()->to('Inicio_controller')->with('error_login', 'Primero debe loguearse'); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

?>