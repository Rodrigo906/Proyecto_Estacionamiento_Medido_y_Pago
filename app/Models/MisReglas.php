<?php
namespace app\Models;

use App\Models\CuentaModel;
use App\Models\UserModel;

class MisReglas
{
    protected $cuentaModel;
    protected $userModel;

    public function __construct()
    {
        $this->cuentaModel = new CuentaModel();
        $this->userModel = new UserModel();

    }

    public function tieneSaldo(string $costo, string &$error = null): bool
    {
        $cuenta = $this->cuentaModel->find(session('id_cuenta'));

        if ($cuenta['saldo'] - (float) $costo < 0) {
            $error = lang('Saldo insuficiente, recargue dinero en su cuenta por favor');
            return false;
        }
        return true;
    }

}

?>