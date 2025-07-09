<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\AgenciasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PerfilController;



Route::get('/', [DashboardController::class, 'index'])->name('pages.dashboard.index');

Route::resource('clientes', ClienteController::class);
Route::delete('/clientes/delete/{nombre}', [ClienteController::class, 'destroy'])->name('user.delete');

Route::resource('coches', CocheController::class);
Route::delete('/coches/delete/{matricula}', [CocheController::class, 'destroy'])->name('coches.delete');

Route::resource('compras', ComprasController::class);
Route::resource('revisiones', RevisionesController::class);
Route::resource('agencias', AgenciasController::class);
Route::resource('proveedores', ProveedoresController::class);

Route::resource('/login', controller: LoginController::class);
Route::resource('/registro', controller: RegisterController::class);
Route::resource('/perfil', controller: PerfilController::class);
