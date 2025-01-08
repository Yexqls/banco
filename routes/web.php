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
    return view('welcome');
});
//Crear cliente
Route::get('/banco', [MenuController::class,'crear'])->name('banco.crear');
Route::get('/usuario/crear', [CrearController::class,'crear'])->name('usuario.crear');
Route::post('/usuario/store', [CrearController::class,'store'])->name('usuario.store');

//Ahorro
Route::get('/cuenta/ahorro', [CuentaController::class, 'ahorro'])->name('cuenta.ahorro');
Route::post('/cuenta/store', [CuentaController::class, 'store'])->name('cuenta.store');

//Transaccion
Route::get('/banco/transaccion', [TransaccionController::class,'crear'])->name('banco.transaccion');


//Consultar
Route::get('/banco/consultar', [ConsultarController::class,'crear'])->name('banco.consultar');
