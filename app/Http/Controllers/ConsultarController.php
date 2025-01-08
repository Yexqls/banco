<?php

namespace App\Http\Controllers;

use App\Models\CuentaAhorro;
use Illuminate\Http\Request;

class ConsultarController extends Controller
{
    public function consulta()
    {
        $cuentas = CuentaAhorro::select('id', 'numero_cuenta')->get();
        return view('banco.consultar_saldo', compact('cuentas'));
    }

    public function consultarSaldo(Request $request)
    {
        $request->validate([
            'cuenta_id' => 'required|exists:cuentas,id',
        ]);

        // Obtener saldo y fecha de cuenta
        $cuenta = CuentaAhorro::find($request->cuenta_id);
        $ultimaTransaccion = $cuenta->transacciones()
            ->latest('fecha_transaccion')
            ->first();
        return view('banco.consultar_saldo', [
            'cuentas' => CuentaAhorro::select('id', 'numero_cuenta')->get(),
            'saldo' => $cuenta->saldo,
            'ultimaTransaccion' => $ultimaTransaccion,
            'cuentaSeleccionada' => $cuenta,
        ]);
    }
}
