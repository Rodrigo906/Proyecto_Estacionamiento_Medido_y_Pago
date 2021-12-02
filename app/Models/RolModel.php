<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class RolModel extends Model{

        protected $table = 'rol';
        protected $primaryKey = 'id_rol';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false; 

        protected $allowedFields = ['id_rol', 'nombre', 'descripcion'];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
    

        public function obtenerIdRol ($nombreRol){
           $result = $this->db->query("SELECT * FROM rol WHERE nombre = '$nombreRol'");
            return $result->getResultArray();
        }
    }

?>