<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tipo_identificacion',
        'numero_identificacion',
        'nombres',
        'apellidos',
        'razon_social',
        'municipio',
    ];

    public function cuentas()
    {
        return $this->hasMany(CuentaAhorro::class, 'cliente_id'); 
    }
}
