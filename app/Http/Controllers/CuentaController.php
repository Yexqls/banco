<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CuentaAhorro;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function ahorro()
    {
        // Obtener todos los clientes
        $clientes = Cliente::all();
        
        return view('banco.crear_ahorro', compact('clientes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'numero_cuenta' => 'required|string|max:255', 
        ]);
    
        $cuenta = new CuentaAhorro();
        $cuenta->cliente_id = $request->cliente_id;
        $cuenta->numero_cuenta = $request->numero_cuenta;
        $cuenta->fecha_creacion = now(); 
        $cuenta->save();
    
        return redirect()->back()->with('success', 'Cuenta de ahorro creada exitosamente.');
    }
    
    

}
