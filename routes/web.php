<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\AgenciaController;
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



Route::resource('revisiones', RevisionController::class)
     ->only(['index','store','destroy']);

Route::resource('agencias', AgenciaController::class);
Route::post('/agencias', [AgenciaController::class, 'store'])->name('agencias.store');
Route::delete('/agencias/{agencia}', [AgenciaController::class, 'destroy'])->name('agencia.delete');


Route::resource('proveedores', ProveedoresController::class);
Route::post('/proveedores', [ProveedoresController::class, 'store'])->name('proveedores.store');
Route::delete('/proveedores/{proveedor}', [ProveedoresController::class, 'destroy'])->name('proveedor.delete');



Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::get('/registro', [RegisterController::class, 'index'])->name('registro.form');
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.store');

Route::resource('/perfil', controller: PerfilController::class);
