<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model{

        protected $table = 'rol';
        protected $primaryKey = 'id_rol';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;  //ver que tipo de eliminado se usara luego

        protected $allowedFields = ['id_rol', 'nombre', 'descripcion'];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
    
    }


?>