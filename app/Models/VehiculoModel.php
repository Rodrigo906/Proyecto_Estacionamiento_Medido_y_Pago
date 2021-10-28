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

    protected $allowedFields = ['patente', 'id_usuario', 'marca', 'modelo'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function registrarVehiculo($patente, $id_usuario, $marca, $modelo)
    {

        $this->db->query("INSERT INTO vehiculo (patente, id_usuario, marca, modelo) " .
            "VALUES ('$patente', '$id_usuario', '$marca', '$modelo')");
    }

}

?>