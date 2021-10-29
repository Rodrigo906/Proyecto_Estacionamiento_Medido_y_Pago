<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ZonaModel extends Model{

        protected $table = 'zona';
        protected $primaryKey = 'id_zona';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;  //ver que tipo de eliminado se usara luego

        protected $allowedFields = ['id_zona', 'nombre_zona', 'horario_pago_mañana', 'horario_pago_tarde', 
                                        'costo_hora', 'limite_X', 'limite_Y'];
        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
    
        public function obtenerVehiculo ($nombre_zona){
            $consulta = $this->db->query('SELECT * FROM zona WHERE nombre_zona = '. $nombre_zona);
            return $consulta->getResultArray();
        }
    }

?>