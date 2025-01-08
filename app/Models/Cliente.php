<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tipo_identificacion',
        'numero_identificacion',
        'nombres',
        'apellidos',
        'razon_social',
        'municipio',
    ];
}
