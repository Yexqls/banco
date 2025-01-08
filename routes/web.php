<?php

use App\Http\Controllers\AhorroController;
use App\Http\Controllers\ConsultarController;
use App\Http\Controllers\CrearController;
use App\Models\CuentaAhorro;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('banco.crear');
});

//Crear cliente
Route::get('/banco', [MenuController::class, 'crear'])->name('banco.crear');
Route::get('/usuario/crear', [CrearController::class, 'crear'])->name('usuario.crear');
Route::post('/usuario/store', [CrearController::class, 'store'])->name('usuario.store');

//Ahorro
Route::get('/cuenta/ahorro', [CuentaController::class, 'ahorro'])->name('cuenta.ahorro');
Route::post('/cuenta/store', [CuentaController::class, 'store'])->name('cuenta.store');

//Transaccion
Route::get('/banco/transaccion', [TransaccionController::class, 'cuenta'])->name('banco.transaccion');
Route::post('/banco/transaccion', [TransaccionController::class, 'registrarTransaccion'])->name('banco.transaccion.registrar');


//Consultar
Route::get('/cuenta/consulta', [ConsultarController::class, 'consulta'])->name('cuenta.consulta');
Route::post('/cuenta/consultar-saldo', [ConsultarController::class, 'consultarSaldo'])->name('cuenta.consultarSaldo');
