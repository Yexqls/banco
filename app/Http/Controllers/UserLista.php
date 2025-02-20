<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class UserLista extends Controller
{
    public function index(){
        $usuarios = Cliente::all();
        return view('banco.usuariosLista', compact('usuarios'));
    }

    public function eliminar($id){
        $usuario = Cliente::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');

        }

        $usuario->delete();
        return redirect()->route('usuarios.index')->with('error', 'Usuario eliminado');
    }
}
