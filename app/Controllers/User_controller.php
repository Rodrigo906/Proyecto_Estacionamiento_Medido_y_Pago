<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolModel;


class User_controller extends BaseController
{

    protected $userModel;
    protected $rolModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->rolModel = new RolModel();
    }


    //retorna el listado de todos los usuarios del sistema
    public function index(){

        $data['usuarios'] = $this->userModel->obtenerListadoUsuarios();
        $data['titulo'] = "Listado de usuarios";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        echo view('usuarios/listado_usuarios', $data);  
        echo view('template/footer');
        
    }

    //Al llamarlo mostrara el formulario de registro de cliente
    public function MostrarFormularioRegistro()
    {
       
        $data['titulo'] = "Crear usuario";
        $data['subtitulo'] = "¡Registrate!";

        echo view('template/head');
        echo view('usuarios/crear_usuario_cliente', $data);
        echo view('template/footer');
    }
    
    //La que usa el administrador
    public function mostrarFormularioAltaUsuario(){

        $data['titulo'] = "Crear usuario";
        $data['subtitulo'] = "Registrar usuario";

        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout'); 
        $data['roles'] = $this->rolModel->findAll();
        echo view('usuarios/crear_usuario', $data);
        echo view('template/footer');
    }

    //tomara los datos del formulario y los guardara en la BD
  
    public function registrarUsuario(){
    
        $validation = service('validation');                  //inicializo la libreria de validacion
        $validation->setRuleGroup('formUsuarioValidation');          //establesco con que reglas se debe validar el formulario
        
        /*si hubo algun error redirecciono de nuevo al usuario al formulario con los datos que eran correctos y
        marcando los errores*/
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $_POST['username'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $contraseña = $_POST['contraseña'];
        if (isset($_POST['rol'])){
            $id_rol = $_POST['rol'];
        }
        else{
            $rol = $this->rolModel->obtenerIdRol("Cliente");
            $id_rol = $rol[0]['id_rol'];
        }
       

        $this->userModel->registrarUsuario(
            $username,
            $nombre,
            $apellido,
            $email,
            $dni,
            $fecha_nacimiento,
            $contraseña,
            $id_rol
        );

        $mensajeExito = [
            'exito' => 'Registrado correctamente',
            'tipo' => 'alert',
            ];
        return redirect()->back()->withInput()->with('mensajes', $mensajeExito);
    }


    //AGREGADO EN SPRINT 2

    public function mostrarFormularioActualizacion (){
        echo view('template/head');
        echo view('template/sidenav');
        echo view('template/layout');
        //Formulario aqui
        echo view('template/footer');
    }

    public function actualizarInformacionPersonal (){

        $validation = service('validation');                
        $validation->setRuleGroup('formActualizacionValidation');        
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $this->userModel->actualizarDatosPersonales(session('username'), $nombre, $apellido, $email, $fecha_nacimiento);
    
        $mensajeExito = [
            'exito' => 'Datos actualizados',
            'tipo' => 'alert',
            ];
        return redirect()->back()->withInput()->with('mensajes', $mensajeExito);    
    }

    public function mostrarFormularioRecuperacion (){
        echo view('template/head');
        echo view('inicio/recuperar_contraseña');
        echo view('template/footer');
      
    }

    public function recuperarContraseña(){

        $validation = service('validation');                
        $validation->setRuleGroup('formRestablecerContraseñaValidation');        
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        //Aqui se deberia enviar un mail al usuario
        //$username = $_POST['username'];
        $this->userModel->restablecerContraseña($_POST['username']);

        $mensajeExito = [
            'exito' => 'Se restablecio su contraseña correctamente. Ahora esta es "1234" ',
            'tipo' => 'alert',
            ];
        return redirect()->back()->withInput()->with('mensajes', $mensajeExito);    
    }
    
    
    //Elimina cualquier usuario pasado por parametro
    public function eliminar($id_usuario)
    {

        echo "eliminado".$id_usuario;
    }

}
