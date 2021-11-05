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


        //Registro de estadia por parte del Cliente y Vendedor
        public function registrarEstadia($id_usuario, $id_vendedor, $id_zona, $id_vehiculo, 
                                            $estado, $estado_pago, $fecha_inicio, $fecha_fin, $precio)
        {
            $this->db->query("INSERT INTO estadia (id_usuario, id_vendedor, id_zona, 
                    id_vehiculo, estado, estado_pago, fecha_inicio, fecha_fin, precio) " .
            "VALUES (NULLIF('$id_usuario', ''), NULLIF('$id_vendedor', ''), '$id_zona', '$id_vehiculo','$estado','$estado_pago', 
                    '$fecha_inicio', NULLIF('$fecha_fin', ''), '$precio')");
        }

        //cierra una estadia indefinida
        public function terminarEstadia ($id_vehiculo, $fecha_fin){
                $this->db->query(" UPDATE estadia SET fecha_fin ='$fecha_fin' WHERE id_vehiculo = '$id_vehiculo' AND fecha_fin IS NULL");
        }

        public function obtenerVehiculosEstacionados($fecha_actual){
                $result = $this->db->query("SELECT * FROM estadia WHERE ('$fecha_actual' BETWEEN fecha_inicio AND fecha_fin) OR fecha_fin IS NULL");
                return $result->getResultArray();
        }

}
