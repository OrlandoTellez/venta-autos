<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\AgenciasController;
use App\Http\Controllers\ProveedoresController;



Route::get('/', [DashboardController::class, 'index'])->name('pages.dashboard.index');

Route::delete('/users/delete/{email}', [DashboardController::class, 'destroy'])->name('user.delete');

Route::resource('clientes', ClienteController::class);
Route::delete('/users/delete/{email}', [ClienteController::class, 'destroy'])->name('user.delete');

Route::resource('coches', CocheController::class);
Route::resource('compras', ComprasController::class);
Route::resource('revisiones', RevisionesController::class);
Route::resource('agencias', AgenciasController::class);
Route::resource('proveedores', ProveedoresController::class);
