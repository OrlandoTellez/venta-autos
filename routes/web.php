<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\AgenciasController;
use App\Http\Controllers\ProveedoresController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('clientes', ClienteController::class);
Route::resource('coches', CocheController::class);
Route::resource('compras', ComprasController::class);
Route::resource('revisiones', RevisionesController::class);
Route::resource('agencias', AgenciasController::class);
Route::resource('proveedores', ProveedoresController::class);
