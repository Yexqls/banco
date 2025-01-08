<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
{
    //
    public function crear(){
        return view('banco.crear_ahorro');
    }
}
