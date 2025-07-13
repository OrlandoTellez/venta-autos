<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\AgenciasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PerfilController;



Route::get('/', [DashboardController::class, 'index'])->name('pages.dashboard.index');

Route::resource('clientes', ClienteController::class);
route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('user.delete');

Route::resource('coches', CocheController::class);
Route::post('/coches', [CocheController::class, 'store'])->name('coches.store');
Route::delete('/coches/{coche}', [CocheController::class, 'destroy'])->name('coche.delete');


Route::resource('compras', CompraController::class);
Route::post('/compras', [CompraController::class, 'store'])->name('compras.store');
Route::delete('/compras/{compra}', [CompraController::class, 'destroy'])->name('compra.delete');



Route::resource('revisiones', RevisionesController::class);
Route::resource('agencias', AgenciasController::class);
Route::resource('proveedores', ProveedoresController::class);

Route::resource('/login', controller: LoginController::class);
Route::resource('/registro', controller: RegisterController::class);
Route::resource('/perfil', controller: PerfilController::class);
