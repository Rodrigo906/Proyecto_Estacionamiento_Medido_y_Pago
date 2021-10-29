<?php

use App\Models\CuentaModel;

class SaldoDisponibleRules
{
    protected $cuentaModel;


    public function __construct()
    {
        $this->cuentaModel = new CuentaModel();
    }

    public function tieneSaldo(string $costo, string &$error = null): bool
    {
        $cuenta = $this->cuentaModel->find( $_SESSION['id_cuenta']);

        if ($cuenta['saldo'] - (float) $costo < 0) {
            $error = lang('Saldo insuficiente, recargue dinero en su cuenta por favor');
            return false;
        }

        return true;
    }
}

?>