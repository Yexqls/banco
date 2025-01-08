<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultarController extends Controller
{
    public function crear(){
        return view('banco.consultar_saldo');
    }
}
