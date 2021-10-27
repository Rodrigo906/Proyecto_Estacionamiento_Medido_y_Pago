<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model{

        protected $table = 'usuario';
        protected $primaryKey = 'id_usuario';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;  //ver que tipo de eliminado se usara luego

        protected $allowedFields = ['username', 'nombre', 'apellido', 'contraseña', 'email', 'dni', 'fecha_nacimiento', 'id_rol'];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;

        //Obtiene todos los usuarios con el nombre del rol correspondiente
        public function obtenerListadoUsuaurios (){
            
            $consulta = $this->db->query("SELECT u.id_usuario, u.username, u.nombre, u.apellido, u.email," . 
                    "u.dni, u.fecha_nacimiento, r.nombre AS rol FROM usuario u JOIN rol r ON (u.id_rol = r.id_rol)");
            return $consulta->getResultArray();
        }
        
        public function registrarUsuario($username, $nombre, $apellido, $email, $dni, 
                                                        $fecha_nacimiento, $contraseña, $rol){  
        
            $this->db->query("INSERT INTO usuario (username, nombre, apellido, email, dni, fecha_nacimiento, contraseña, id_rol) " . 
                    "VALUES ('$username', '$nombre', '$apellido', '$email', '$dni', '$fecha_nacimiento', '$contraseña', '$rol')");                                        

        }
    

    }

?>