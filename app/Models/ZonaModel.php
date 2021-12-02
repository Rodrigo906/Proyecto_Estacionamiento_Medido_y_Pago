<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class ZonaModel extends Model
{

    protected $table = 'zona';
    protected $primaryKey = 'id_zona';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftdeletes = false;

    protected $allowedFields = [
        'id_zona', 'nombre_zona', 'horario_pago_mañana', 'horario_pago_tarde',
        'costo_hora', 'limite_X', 'limite_Y'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerZona($nombre_zona)
    {
        $consulta = $this->db->query('SELECT * FROM zona WHERE nombre_zona = ' . $nombre_zona);
        return $consulta->getResultArray();
    }

    public function esHorarioCobro($id_zona): bool
    {
        $zona = $this->find($id_zona);

        $fechaActual = new Time('now', 'America/Argentina/Buenos_Aires');

        if ($zona['horario_pago_mañana'] != null) {
            if ($this->horaActualSeEncuentraEnRango($zona['horario_pago_mañana'], $fechaActual)) {
                return true;
            }
        }

        if ($zona['horario_pago_tarde'] != null) {
            if ($this->horaActualSeEncuentraEnRango($zona['horario_pago_tarde'], $fechaActual)) {
                 return true;
            }
        }
        return false;
    }

    public function horaActualSeEncuentraEnRango($horario_pago, $fechaActual): bool
    {
        list($inf_hMañana, $sup_hMañana) = explode("-", $horario_pago);

        $inf_hMañana = $this->crearHora($inf_hMañana);
        $sup_hMañana = $this->crearHora($sup_hMañana);

        $horaActual = Time::createFromTime($fechaActual->getHour(), $fechaActual->getMinute());
       
        if (strtotime($inf_hMañana->toDateTimeString()) <= strtotime($horaActual->toDateTimeString()) && strtotime($horaActual->toDateTimeString()) <= strtotime($sup_hMañana->toDateTimeString())) {
            return true; 
        }
        return false;
    }

    private function crearHora($stringHora)
    {
        list($hora, $minutos) = explode(":", $stringHora);
        return Time::createFromTime($hora, $minutos);
    }
}
