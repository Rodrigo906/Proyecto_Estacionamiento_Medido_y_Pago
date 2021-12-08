<?php

namespace App\Models;

use CodeIgniter\Model;

class InfraccionModel extends Model
{

    protected $table = 'infraccion';
    protected $primaryKey = 'id_infraccion';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftdeletes = false; 

    protected $allowedFields = ['id_vehiculo', 'id_zona', 'motivo', 'fecha', 'direccion'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerInfracciones (){
        $infracciones = $this->db->query("SELECT patente, fecha, z.nombre_zona, direccion, motivo FROM infraccion i JOIN vehiculo v ON (i.id_vehiculo = v.id_vehiculo) JOIN zona z ON (i.id_zona = z.id_zona)");
        return $infracciones->getResultArray();
    }
}
?>