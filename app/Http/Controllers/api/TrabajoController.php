<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajoRequest;
use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::all();
        return \response($trabajos);
    }


    public function store(TrabajoRequest $request)
    {
        $trabajo = Trabajo::create($request->validated());
        return \response($trabajo);

    }

    public function show(Trabajo $trabajo)
    {
        $trabajo = Trabajo::findOrFail($trabajo->id);
        return \response($trabajo);
    }


    public function update(TrabajoRequest $request, Trabajo $trabajo)
    {
        $trabajo = Trabajo::findOrFail($trabajo->id)->update($request->validated());
        return \response($trabajo);
    }

    public function destroy(Trabajo $trabajo)
    {
        $trabajos = Trabajo::destroy($trabajo->id);
        return \response("trabajo eliminado");
    }
}
