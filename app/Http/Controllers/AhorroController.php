<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhorroController extends Controller
{
    public function crear(){
        return view('banco.crear_ahorro');
    }
}
