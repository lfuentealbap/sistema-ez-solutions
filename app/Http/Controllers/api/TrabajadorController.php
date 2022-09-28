<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajadorRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadors = User::all();
        return \response($trabajadors);
    }


    public function store(TrabajadorRequest $request)
    {
        $trabajador = User::create($request->validated());
        return \response($trabajador);

    }

    public function show(User $trabajador)
    {
        $trabajador = User::findOrFail($trabajador->id);
        return \response($trabajador);
    }


    public function update(TrabajadorRequest $request, User $trabajador)
    {
        $trabajador = User::findOrFail($trabajador->id)->update($request->validated());
        return \response($trabajador);
    }

    public function destroy(User $trabajador)
    {
        $trabajadores = User::destroy($trabajador->id);
        return \response("Trabajador eliminado");
    }
}
