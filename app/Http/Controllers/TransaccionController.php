<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAhorro;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    public function cuenta()
    {
        $cuentas = CuentaAhorro::select('id', 'numero_cuenta')->get();
        return view('banco.transaccion', compact('cuentas'));
    }

    public function registrarTransaccion(Request $request)
    {
        $request->validate([
            'cuenta_id' => 'required|exists:cuentas,id',
            'tipo_transaccion' => 'required|in:retiro,consignacion',
            'monto' => 'required|numeric|min:0.01',
            'fecha_creacion' => 'required|date',
        ]);
    
        $cuenta = CuentaAhorro::findOrFail($request->cuenta_id);
    
        if ($request->tipo_transaccion === 'retiro') {
            // Validar que el saldo sea suficiente
            if ($cuenta->saldo < $request->monto) {
                // Redirigir con un mensaje de error
                return redirect()->back()->with('error', 'El saldo disponible no es suficiente para realizar el retiro.');
            }
            $cuenta->saldo -= $request->monto;
        } elseif ($request->tipo_transaccion === 'consignacion') {
            $cuenta->saldo += $request->monto;
        }
    
        $cuenta->save();
    
        // Registrar transacción
        Transaccion::create([
            'cuenta_id' => $cuenta->id,
            'monto' => $request->monto,
            'tipo_transaccion' => $request->tipo_transaccion,
            'fecha_transaccion' => $request->fecha_creacion,
        ]);
    
        return redirect()->back()->with('success', 'Transacción registrada exitosamente.');
    }
    
}
