<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Trabajo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imprimirGasto(){
        $mes = Carbon::now('m');
        $gasto = Gasto::whereMonth('fecha_gasto', '=', $mes)
        ->get();
        $pdf = Pdf::loadView('plataforma.gastos.informe');
     return $pdf->download('informe-gastos-mes.pdf');
    }
    public function informeRendimiento(){
        $mes = Carbon::now('m');
        $trabajos = Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador', Trabajo::raw("COUNT(trabajos.rut_trabajador) as cantidad"))->where('estado', 'finalizado')->groupBy('rut_trabajador')->get();
        $trabajos1 = Trabajo::whereMonth('fecha_termino', '=', $mes)->select('*')->where('estado', 'finalizado')->get();
        $trabajadores = User::all();
        $data = ['trabajos' => $trabajos, 'trabajos1' => $trabajos1, 'trabajadores'=> $trabajadores];
        $pdf = Pdf::loadView('plataforma.informes.rendimiento', $data);
     return $pdf->download('informe-rendimiento-mes.pdf');
    }
}
