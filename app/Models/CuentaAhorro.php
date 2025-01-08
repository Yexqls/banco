<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentaAhorro extends Model
{
    protected $table = 'cuentas';
    protected $primaryKey = 'id_cuentas';
    protected $fillable = [
        'cliente_id',
        'numero_cuenta',
        'saldo',
        'fecha_creacion'
    ];

}
