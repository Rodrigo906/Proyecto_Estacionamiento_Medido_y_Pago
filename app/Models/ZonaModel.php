<?php

    namespace App\Models;

use CodeIgniter\I18n\Time;
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
    
        public function obtenerZona ($nombre_zona){
            $consulta = $this->db->query('SELECT * FROM zona WHERE nombre_zona = '. $nombre_zona);
            return $consulta->getResultArray();
        }

        public function esHorarioCobro ($id_zona):bool{
            $zona = $this->find($id_zona);
            $fechaActual = new Time('now', 'America/Argentina/Buenos_Aires');

            if($fechaActual->gethour() < Time::createFromTime(13, 30)){
               if($this->horaActualSeEncuentraEnRango($zona[0]['horario_pago_mañana'], $fechaActual)){
                   return true;
               }
            }
            else
                if($zona[0]['horario_pago_tarde'] != null){
                    if($this->horaActualSeEncuentraEnRango($zona[0]['horario_pago_tarde'], $fechaActual)){
                        return true;
                    }
                }

            return false;
        }

        private function horaActualSeEncuentraEnRango ($horario_pago, $fechaActual):bool{

            list($inf_hMañana, $sup_hMañana) = explode("-", $horario_pago);

            $inf_hMañana = $this->crearHora($inf_hMañana);
            $sup_hMañana = $this->crearHora($sup_hMañana);
            $horaActual = Time::createFromTime($fechaActual->getHour(), $fechaActual->getMinute());

            if($inf_hMañana <= $horaActual <= $sup_hMañana){
                return true;
            }
            return false;
        }

        private function crearHora ($stringHora){
            list($hora, $minutos) = explode(":", $stringHora);
            return Time::createFromTime($hora, $minutos);
        }



    }

?>