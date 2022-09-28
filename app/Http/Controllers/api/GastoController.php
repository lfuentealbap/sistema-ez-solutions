<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GastoRequest;
use App\Models\Gasto;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();
        return \response($gastos);
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

    public function store(GastoRequest $request)
    {
        $gasto = Gasto::create($request->validated());
        return \response($gasto);

    }

    public function show(Gasto $gasto)
    {
        $gasto = Gasto::findOrFail($gasto->id);
        return \response($gasto);
    }


    public function update(GastoRequest $request, Gasto $gasto)
    {
        $gasto = Gasto::findOrFail($gasto->id)->update($request->validated());
        return \response($gasto);
    }

    public function destroy(Gasto $gasto)
    {
        $gastos = Gasto::destroy($gasto->id);
        return \response("Gasto eliminado");
    }
}
