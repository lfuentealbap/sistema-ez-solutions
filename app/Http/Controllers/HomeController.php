<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mes = Carbon::now('m');$mes = Carbon::now('m');
        return view('plataforma.inicio')->with([
            'trabajos'=> Trabajo::all(),
            'sueldos' => Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador','pago', Trabajo::raw("SUM(trabajos.pago) as sueldo"))->where('estado', 'finalizado')->groupBy('rut_trabajador')->get(),
        ]);
    }
}
