<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class CrearController extends Controller
{
    public function crear()
    {
        return view('banco.crear_cliente');
    }

    //registrar cliente
    public function store(Request $request)
    {
        $request->validate([
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'razon_social' => 'nullable|string|max:255',
            'municipio' => 'required|string|max:255',
        ]);

        $cliente = new Cliente();
        $cliente->tipo_identificacion = $request->tipo_identificacion;
        $cliente->numero_identificacion = $request->numero_identificacion;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->razon_social = $request->razon_social;
        $cliente->municipio = $request->municipio;

        $cliente->save();

        return redirect()->back()->with('success', 'Cliente creado exitosamente.');
    }
}
