<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class EstadiaModel extends Model{

        protected $table = 'estadia';
        protected $primaryKey = 'id_estadia';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;  //ver que tipo de eliminado se usara luego

        protected $allowedFields = ['id_estadia', 'id_usuario', 'id_vendedor', 'id_zona', 
                'id_vehiculo', 'estado', 'estado_pago', 'fecha_inicio', 'fecha_fin', 'precio'];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;



    
    }
