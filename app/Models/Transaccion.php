<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $fillable = [
        'cuenta_id',
        'monto',
        'tipo',
        'fecha_transaccion',
    ];

    public function cuenta()
    {
        return $this->belongsTo(CuentaAhorro::class, 'cuenta_id', 'id_cuentas');
    }
}