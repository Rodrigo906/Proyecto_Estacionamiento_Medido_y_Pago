<?php

namespace App\Models;

use CodeIgniter\Model;


class EstadiaModel extends Model
{
        protected $table = 'estadia';
        protected $primaryKey = 'id_estadia';

        protected $useAutoIncrement = true;

        protected $returnType = 'array';
        protected $useSoftdeletes = false;

        protected $allowedFields = [
                'id_estadia', 'id_usuario', 'id_vendedor', 'id_zona',
                'id_vehiculo', 'estado_pago', 'indefinido', 'fecha_inicio', 'fecha_fin', 'precio'
        ];

        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deleteField = 'deleted_at';

        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;


        //cierra una estadia indefinida
        public function terminarEstadia($id_vehiculo, $fecha_fin, $precio, $estado_pago)
        {
                $this->db->query(" UPDATE estadia SET fecha_fin ='$fecha_fin', precio='$precio', estado_pago='$estado_pago', indefinido=false WHERE id_vehiculo = '$id_vehiculo' AND indefinido=true");
        }

        public function obtenerUltimaEstadia($id_vehiculo)
        {
                $result = $this->db->query("SELECT * FROM estadia WHERE id_vehiculo='$id_vehiculo' AND indefinido=true");
                return $result->getResultArray();
        }


        public function obtenerVehiculosEstacionados($fecha_actual)
        {
                $result = $this->db->query(
                        "SELECT * 
                        FROM estadia e JOIN vehiculo v ON (e.id_vehiculo = v.id_vehiculo) 
                        JOIN zona z ON (e.id_zona = z.id_zona) WHERE ('$fecha_actual' BETWEEN e.fecha_inicio AND e.fecha_fin) 
                        OR e.indefinido=true");
                return $result->getResultArray();
        }

        public function hayVehiculosEstacionados($fecha_actual)
        {
                $result = $this->db->query("SELECT * FROM estadia e JOIN vehiculo v ON (e.id_vehiculo = v.id_vehiculo) " .
                        "JOIN usuario u ON (e.id_usuario = u.id_usuario) WHERE " .
                        "('$fecha_actual' BETWEEN e.fecha_inicio AND e.fecha_fin) OR e.indefinido=true");
                if ($result->getNumRows() != 0) {
                        return true;
                }
                return false;
        }

        public function tieneEstadiaActiva($id_vehiculo, $fecha_actual)
        {
                $result = $this->db->query("SELECT * FROM estadia WHERE id_vehiculo= '$id_vehiculo' AND (('$fecha_actual' BETWEEN fecha_inicio AND fecha_fin) OR indefinido=true)");

                if ($result->getNumRows() != 0) {
                        return true;
                }
                return false;
        }

        public function obtenerVentas($id_vendedor)
        {
                $result = $this->db->query("SELECT v.patente, v.marca, CONCAT('Desde ', e.fecha_inicio, ' hasta ', e.fecha_fin) fecha, e.precio " .
                        "FROM estadia e JOIN vehiculo v ON (e.id_vehiculo = v.id_vehiculo) " .
                        "JOIN usuario u ON (e.id_vendedor = u.id_usuario) WHERE e.id_vendedor= '$id_vendedor'");
                return $result->getResultArray();
        }

        public function tieneEstadiaAbierta($id_usuario, &$tieneEstadia)
        {
                $result = $this->db->query("SELECT * FROM estadia e WHERE e.id_usuario ='$id_usuario' AND e.indefinido=true");

                if ($result->getNumRows() != 0) {
                        $tieneEstadia = true;
                } else {
                        $tieneEstadia = false;
                }
                return $result->getResultArray();
        }

        //Obtiene las estadias en estado "Pendiente" de un usuario determinado.
        public function obtenerEstadiasPendientes($id_usuario)
        {
                $result = $this->db->query("SELECT e.id_estadia, CONCAT('Desde ', e.fecha_inicio, ' hasta ', e.fecha_fin) fecha, e.precio ,v.patente
                FROM estadia e
                JOIN vehiculo v ON (v.id_vehiculo=e.id_vehiculo)
                WHERE e.estado_pago='Pendiente' AND 
                e.id_usuario='$id_usuario'");
                return $result->getResultArray();
        }

        public function pagarEstadia($id_estadia)
        {
                $this->db->query("UPDATE estadia SET estado_pago='Pagado' WHERE id_estadia = '$id_estadia'");
        }
}
