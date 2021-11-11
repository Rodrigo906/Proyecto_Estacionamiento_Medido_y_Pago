<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filter_acceso implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!in_array(session('rol'), $arguments)){
          $data['mensaje'] = "Acceso restringido: no posee los permisos necesarios para acceder a esta seccion";
            echo view('template/head');
            echo view('template/sidenav');
            echo view('template/layout');
            echo view('errores/accesoRestringido', $data);
            echo view('template/footer');
           exit;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

?>