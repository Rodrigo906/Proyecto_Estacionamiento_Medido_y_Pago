<?php

namespace App\Models;

use CodeIgniter\Entity\Cast\IntegerCast;
use CodeIgniter\Model;

class CuentaModel extends Model
{

    protected $table = 'cuenta';
    protected $primaryKey = 'id_cuenta';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftdeletes = false;

    protected $allowedFields = ['id_usuario', 'saldo'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deleteField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function estadoPago($costo)
    {
        $cuenta = $this->find(session('id_cuenta'));
        $diferencia = $cuenta['saldo'] - $costo;
        if ($diferencia < 0) {
            return "Pendiente";
        }
        $this->restarDineroCuenta(session('id_cuenta'), $diferencia);
        return "Pagado";
    }

    public function obtenerSaldo ($id_cuenta){
        $result = $this->db->query("SELECT saldo FROM cuenta WHERE id_cuenta='$id_cuenta'");
        $row = $result->getRow();
        return $row->saldo;
    }

    public function restarDineroCuenta ($cuenta, $saldo){
        $this->db->query("UPDATE cuenta SET saldo=saldo-'$saldo' WHERE id_cuenta='$cuenta'");
    }

    public function cargarDineroCuenta ($cuenta, $saldo){
        $this->db->query("UPDATE cuenta SET saldo=saldo+'$saldo' WHERE id_cuenta='$cuenta'");
    }


}