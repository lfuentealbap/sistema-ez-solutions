<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacionProductoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoCotizacionController;
use App\Http\Controllers\TrabajoController;
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

//trabajos
Route::get('plataforma/trabajos',[TrabajoController::class, 'index'])->name('plataforma.trabajos.index');
Route::get('plataforma/trabajos/encurso',[TrabajoController::class, 'enCurso'])->name('plataforma.trabajos.encurso');
Route::get('plataforma/trabajos/editar',[TrabajoController::class, 'editar'])->name('plataforma.trabajos.editar');
Route::get('plataforma/trabajos/suspender',[TrabajoController::class, 'suspenderT'])->name('plataforma.trabajos.suspender');
Route::get('plataforma/trabajos/todosencurso',[TrabajoController::class, 'todosEnCurso'])->name('plataforma.trabajos.todosencurso');
Route::get('plataforma/trabajos/mistrabajos',[TrabajoController::class, 'mistrabajos'])->name('plataforma.trabajos.mistrabajos');
Route::get('plataforma/trabajos/trabajoshoy',[TrabajoController::class, 'hoy'])->name('plataforma.trabajos.trabajoshoy');
Route::get('plataforma/trabajos/finalizado',[TrabajoController::class, 'finalizado'])->name('plataforma.trabajos.finalizados');
Route::get('plataforma/trabajos/create', [TrabajoController::class, 'create'])->name('plataforma.trabajos.create');
Route::post('plataforma/trabajos', [TrabajoController::class, 'store'])->name('trabajos.store');
Route::get('plataforma/trabajos/{trabajo}', [TrabajoController::class, 'show'] )->name('plataforma.trabajos.show');
Route::get('plataforma/trabajos/{trabajo}/edit', [TrabajoController::class, 'edit'])->name('plataforma.trabajos.edit');
Route::match(['put', 'patch'],'plataforma/trabajos/{trabajo}', [TrabajoController::class, 'update'])->name('plataforma.trabajos.update');
Route::delete('plataforma/trabajos/{trabajo}', [TrabajoController::class, 'destroy'])->name('plataforma.trabajos.destroy');
Route::match(['put', 'patch'],'plataforma/trabajos/suspender/{trabajo}', [TrabajoController::class, 'suspender'])->name('plataforma.trabajos.suspender');

//gastos
Route::get('plataforma/gastos',[GastoController::class, 'index'])->name('plataforma.gastos.index');
Route::get('plataforma/gastos/editar',[GastoController::class, 'editar'])->name('plataforma.gastos.editar');
Route::get('plataforma/gastos/eliminar',[GastoController::class, 'eliminar'])->name('plataforma.gastos.eliminar');
Route::get('plataforma/gastos/informe',[GastoController::class, 'informe'])->name('plataforma.gastos.informe');
Route::get('plataforma/gastos/create', [GastoController::class, 'create'])->name('plataforma.gastos.create');
Route::post('plataforma/gastos', [GastoController::class, 'store'])->name('gastos.store');
Route::get('plataforma/gastos/{gasto}', [GastoController::class, 'show'] )->name('plataforma.gastos.show');
Route::get('plataforma/gastos/{gasto}/edit', [GastoController::class, 'edit'])->name('plataforma.gastos.edit');
Route::match(['put', 'patch'],'plataforma/gastos/{gasto}', [GastoController::class, 'update'])->name('plataforma.gastos.update');
Route::delete('plataforma/gastos/{gasto}', [GastoController::class, 'destroy'])->name('plataforma.gastos.destroy');
Route::get('imprimirGastos', [GastoController::class, 'imprimir'])->name('plataforma.gastos.imprimir');


Auth::routes();

Route::get('/plataforma', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
