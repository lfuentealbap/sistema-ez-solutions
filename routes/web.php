<?php

use App\Http\Controllers\ProductoController;
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
Route::get('plataforma/productos',[ProductoController::class, 'index'])->name('plataforma.productos.index');
Route::get('plataforma/productos/create', [ProductoController::class, 'create'])->name('plataforma.productos.create');
Route::post('plataforma/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('plataforma/productos/{producto}', [ProductoController::class, 'show'] )->name('plataforma.productos.show');
Route::get('plataforma/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('plataforma.productos.edit');
Route::match(['put', 'patch'],'plataforma/productos/{producto}', [ProductoController::class, 'update'])->name('plataforma.productos.update');
Route::delete('plataforma/productos/{producto}', [ProductoController::class, 'destroy'])->name('plataforma.productos.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
