<?php

use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\CotizacionController;
use App\Http\Controllers\api\GastoController;
use App\Http\Controllers\api\OTController;
use App\Http\Controllers\api\ProductoController;
use App\Http\Controllers\api\TrabajadorController;
use App\Http\Controllers\api\TrabajoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('cotizaciones', CotizacionController::class);
Route::apiResource('gastos', GastoController::class);
Route::apiResource('ots', OTController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('trabajadores', TrabajadorController::class);
Route::apiResource('trabajos', TrabajoController::class);
