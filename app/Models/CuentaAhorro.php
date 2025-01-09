<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentaAhorro extends Model
{
    protected $table = 'cuentas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cliente_id',
        'numero_cuenta',
        'saldo',
        'fecha_creacion'
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'cuenta_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
