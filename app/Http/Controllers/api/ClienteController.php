<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return \response($clientes);
    }

    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());
        return \response($cliente);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return \response($cliente);
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id)->update($request->validated());
        return \response($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::destroy($id);
        return \response("El cliente ha sido eliminado");

    }
}
