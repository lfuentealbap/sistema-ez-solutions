<?php

namespace App\Http\Controllers;

use App\Http\Requests\GastoRequest;
use App\Models\Gasto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class GastoController extends Controller
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
        return view('plataforma.gastos.index')->with([
            'gastos' => Gasto::all(),
        ]);
    }
    public function editar()
    {
        return view('plataforma.gastos.editar')->with([
            'gastos' => Gasto::all(),
        ]);
    }
    public function eliminar()
    {
        return view('plataforma.gastos.eliminar')->with([
            'gastos' => Gasto::all(),
        ]);
    }
    public function informe()
    {
        $mes = Carbon::now('m');
        return view('plataforma.gastos.visual')->with([
            'gastos' => Gasto::whereMonth('fecha_gasto', '=', $mes)
            ->get(),
        ]);
    }
    public function imprimir(){
        $mes = Carbon::now('m');
        $gastos = (Gasto::whereMonth('fecha_gasto', '=', $mes)
        ->get());
        $data = ['gastos' => $gastos];

        //dd($data);
        $pdf = PDF::loadView('plataforma.gastos.informe', $data);
     return $pdf->download('informe-gastos-mes.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plataforma.gastos.create')->with([
            'trabajadores' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GastoRequest $request)
    {
        $gasto = Gasto::create($request->validated());
        return redirect()->back()->withSuccess('El gasto '.$gasto->nombre.' fué registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        $fecha = Carbon::parse($gasto->fecha_gasto)->format('d-m-Y');
        return view('plataforma.gastos.show')->with([
            'gasto'=> $gasto, 'fecha' => $fecha,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        return view('plataforma.gastos.edit')->with([
            'gasto'=> $gasto, 'trabajadores' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(GastoRequest $request, Gasto $gasto)
    {
        $gasto->update($request->validated());
        return redirect()->route('plataforma.gastos.index')->withSuccess('El gasto '.$gasto->nombre.' fué modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->back()->withSuccess('El gasto '.$gasto->nombre.' ha sido eliminado');
    }
}
