<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PuntoVentaModel extends Model{

        protected $table = 'punto_venta';
        protected $primaryKey = 'id_puntoVenta';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;  

        protected $allowedFields = ['id_puntoVenta', 'cuit', 'nombre', 'descripcion'];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
    
    }

?>