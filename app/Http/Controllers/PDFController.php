<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
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
}
