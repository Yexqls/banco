<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaccionController extends Controller
{
        //
        public function crear(){
            return view('banco.transaccion');
        }
}
