<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajadorRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plataforma.trabajadores.index')->with([
            'trabajadores' => User::all(),
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(User $trabajador)
    {

        return view('plataforma.trabajadores.show')->with([
            'trabajador'=> $trabajador,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(User $trabajador)
    {
        return view('plataforma.trabajadores.edit')->with([
            'trabajador'=> $trabajador,//Product::findOrFail($product),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajadorRequest $request, User $trabajador)
    {
        $trabajador->update($request->validated());
        return redirect()->route('plataforma.trabajador.index')->withSuccess('El trabajador '.$trabajador->nombres.' '.$trabajador->apellidos.' fué modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $trabajador)
    {
        $trabajador->delete();
        return redirect()->route('plataforma.trabajadores.index')->withSuccess('El trabajador '.$trabajador->nombres.' '.$trabajador->apellidos.' ha sido eliminado');
    }
}
