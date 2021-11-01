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
        echo view('template/head');
        echo view('inicio/login');
        echo view('template/footer');
    }

    //Guarda el estado del usuario y lo redirige al home correspondiente
    public function loguear()
    {
        $validation = service('validation');
        $validation->setRuleGroup('formLoginValidation');

        if ($validation->withRequest($this->request)->run()) {

            $username = $_POST['username'];
            $usuario = $this->userModel->obtenerDatosUsuario($username);

            if ($_POST['contraseña'] == $usuario[0]['contraseña']) {
                $rol = $this->rolModel->find($usuario[0]['id_rol']);
                $datosLogin = [
                    'id_usuario' => $usuario[0]['id_usuario'],
                    'id_cuenta' => $usuario[0]['id_cuenta'],
                    'username' => $username,
                    'rol' => $rol['nombre'],
                    'estaLogueado' => true,
                ];

                $session = session();
                $session->set($datosLogin);
                return redirect()->to('Inicio_controller/inicio');
            } else
                return redirect()->back()->withInput()->with('contraseña', 'Contraseña incorrecta');
        } else
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    public function cerrarSesion()
    {
        session()->destroy();
        return redirect()->to('Inicio_controller');
    }


    public function inicio()
    {

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('inicio/inicio');
        echo view('template/footer');
    }
}
