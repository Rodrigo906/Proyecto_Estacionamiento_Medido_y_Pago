<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculoModel extends Model
{

    protected $table = 'vehiculo';
    protected $primaryKey = 'id_vehiculo';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftdeletes = false;  //ver que tipo de eliminado se usara luego

    protected $allowedFields = ['patente', 'marca', 'modelo'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function registrarVehiculo($patente, $marca, $modelo, $id_usuario)
    {
        $this->db->query("INSERT INTO vehiculo (patente, marca, modelo) " .
            "VALUES ('$patente', '$marca', '$modelo')");

        $vehiculo = $this->obtenerVehiculo($patente);
        $id_vehiculo = $vehiculo[0]['id_vehiculo'];

        $this->db->query("INSERT INTO vehiculo_usuario (id_vehiculo, id_usuario) " .
            "VALUES ('$id_vehiculo', '$id_usuario')");
    }

    public function obtenerVehiculo($patente)
    {
        $consulta = $this->db->query("SELECT * FROM vehiculo WHERE patente='$patente'");
        return $consulta->getResultArray();
    }

    public function obtenerMisVehiculos($id_usuario)
    {
        $consulta = $this->db->query("SELECT * FROM vehiculo_usuario vu JOIN vehiculo v ON (vu.id_vehiculo = v.id_vehiculo) WHERE vu.id_usuario=" . $id_usuario);
        return $consulta->getResultArray();
    }

    public function estaEstacionado($id_vehiculo)
    {
        $estadia = $this->db->query("SELECT * FROM estadia e WHERE e.id_vehiculo = '$id_vehiculo' AND fecha_fin IS NULL");
        if ($estadia != null) {
            return true;
        }
        return false;
    }

    public function asociarVehiculo ($id_usuario, $id_vehiculo){

        if(!$this->yaEstaAsociado($id_usuario, $id_vehiculo)){
            $this->db->query("INSERT INTO vehiculo_usuario (id_vehiculo, id_usuario) " .
            "VALUES ('$id_vehiculo', '$id_usuario')");
            return true;
        }
        else
            return false;
    }

    private function yaEstaAsociado ($id_usuario, $id_vehiculo){
        $result = $this->db->query("SELECT * FROM vehiculo_usuario vu WHERE id_usuario='$id_usuario' AND id_vehiculo='$id_vehiculo'");
        if ($result->getNumRows() != 0) {
            return true;
        }
        return false;
    }

}
