<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return \response($productos);
    }


    public function store(ProductoRequest $request)
    {
        $producto = Producto::create($request->valcodigoated());
        return \response($producto);

    }

    public function show(Producto $producto)
    {
        $producto = Producto::findOrFail($producto->codigo);
        return \response($producto);
    }


    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto = Producto::findOrFail($producto->codigo)->update($request->valcodigoated());
        return \response($producto);
    }

    public function destroy(Producto $producto)
    {
        $productos = Producto::destroy($producto->codigo);
        return \response("Producto eliminado");
    }
}
