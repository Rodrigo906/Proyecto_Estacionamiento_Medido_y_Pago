<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftdeletes = false;

    protected $allowedFields = ['username', 'nombre', 'apellido', 'contraseña', 'email', 'dni', 'fecha_nacimiento', 'id_rol'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    //Obtiene todos los usuarios con el nombre del rol correspondiente
    public function obtenerListadoUsuarios()
    {
        $consulta = $this->db->query("SELECT u.id_usuario, u.username, u.nombre, u.apellido, u.email," .
            "u.dni, u.fecha_nacimiento, r.nombre AS rol FROM usuario u JOIN rol r ON (u.id_rol = r.id_rol) WHERE u.eliminado= false");
        return $consulta->getResultArray();
    }

    public function obtenerDatosUsuario($username)
    {
        $result = $this->db->query("SELECT * FROM usuario WHERE username='$username'");
        return $result->getResultArray();
    }

    public function obtenerDatosUsuarioCliente($username)
    {
        $result = $this->db->query("SELECT * FROM usuario u JOIN cuenta c ON (u.id_usuario = c.id_usuario) WHERE u.username = '$username'");

        return $result->getResultArray();
    }

    public function restablecerContraseña($username)
    {
        $this->db->query("UPDATE usuario SET contraseña= '1234' WHERE username= '$username'");
    }


    public function eliminarUsuario($id)
    {
        $estado = true;
        $this->db->query("UPDATE usuario SET eliminado='$estado' WHERE id_usuario='$id'");
    }

    public function tieneVehiculos($id_usuario)
    {
        $consulta = $this->db->query("SELECT * FROM vehiculo_usuario vu JOIN vehiculo v ON (vu.id_vehiculo = v.id_vehiculo) WHERE vu.id_usuario=" . $id_usuario);
        if ($consulta->getNumRows() != 0) {
            return true;
        }
        return false;
    }
}
