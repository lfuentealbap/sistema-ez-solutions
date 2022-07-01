<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionProductoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoCotizacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio.inicio');
})->name('inicio');

Route::get('/plataforma', function () {
    return view('plataforma.inicio');
})->name('plataforma');
//productos
Route::get('plataforma/productos',[ProductoController::class, 'index'])->name('plataforma.productos.index');
Route::get('plataforma/productos/create', [ProductoController::class, 'create'])->name('plataforma.productos.create');
Route::post('plataforma/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('plataforma/productos/{producto}', [ProductoController::class, 'show'] )->name('plataforma.productos.show');
Route::get('plataforma/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('plataforma.productos.edit');
Route::match(['put', 'patch'],'plataforma/productos/{producto}', [ProductoController::class, 'update'])->name('plataforma.productos.update');
Route::delete('plataforma/productos/{producto}', [ProductoController::class, 'destroy'])->name('plataforma.productos.destroy');

//clientes
Route::get('plataforma/clientes',[ClienteController::class, 'index'])->name('plataforma.clientes.index');
Route::get('plataforma/clientes/create', [ClienteController::class, 'create'])->name('plataforma.clientes.create');
Route::post('plataforma/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('plataforma/clientes/{cliente}', [ClienteController::class, 'show'] )->name('plataforma.clientes.show');
Route::get('plataforma/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('plataforma.clientes.edit');
Route::match(['put', 'patch'],'plataforma/clientes/{cliente}', [ClienteController::class, 'update'])->name('plataforma.clientes.update');
Route::delete('plataforma/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('plataforma.clientes.destroy');

//cotizaciones
Route::get('plataforma/cotizaciones',[CotizacionController::class, 'index'])->name('plataforma.cotizaciones.index');
Route::get('plataforma/cotizaciones/create', [CotizacionController::class, 'create'])->name('plataforma.cotizaciones.create');
Route::post('plataforma/cotizaciones', [ProductoCotizacionController::class, 'store'])->name('cotizaciones.productos.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
