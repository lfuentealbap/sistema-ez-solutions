<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajoCancelarRequest;
use App\Http\Requests\TrabajoRequest;
use App\Http\Requests\TrabajoSuspenderRequest;
use App\Mail\TrabajoActualizadoMailable;
use App\Mail\TrabajoAsignadoMailable;
use App\Mail\TrabajoCanceladoMailable;
use App\Mail\TrabajoSuspendidoMailable;
use App\Models\Area;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class TrabajoController extends Controller
{
    //Invoca middleware en constructor para indicar que para acceder a las funcionalidades de Trabajo
    //El usuario debe estar logueado en el sistema
    public function __construct()
    {
        $this->middleware('auth');
        //Además, verifica automáticamente si un trabajo en curso excedió la fecha de término
        //Para cambiar su estado a atrasado
        $hoy = Carbon::parse(Carbon::now());
        $trb = Trabajo::all();
        foreach($trb as $tr){
            if(($tr->estado == "en curso") && ($hoy->gt(Carbon::parse($tr->fecha_termino)))){
                TrabajoController::atrasar($tr);
            }
        }
    }

    //Invoca a vista en donde muestra todos los trabajos existentes en la base de datos
    public function index(){

        return view('plataforma.trabajos.index')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite editar un trabajo en específico
    public function editar(){

        return view('plataforma.trabajos.editar')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite enlistar los trabajos existentes para suspender un trabajo seleccionado
    public function suspenderT(){

        return view('plataforma.trabajos.suspender')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite enlistar los trabajos existentes para cancelar un trabajo seleccionado
    public function cancelarT(){

        return view('plataforma.trabajos.cancelar')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite enlistar los trabajos en curso de cada trabajador
    public function enCurso(){

        return view('plataforma.trabajos.encurso')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite mostrar los trabajos del usuario que ha iniciado sesión en el sistema
    public function misTrabajos(){

        return view('plataforma.trabajos.mistrabajos')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite mostrar los trabajos que corresponden al día en curso
    public function hoy(){

        $hoy = Carbon::parse(Carbon::now())->format('d-m-Y');
        $trabajos = Trabajo::all();
        return view('plataforma.trabajos.trabajoshoy')->with([
            'trabajos' => Trabajo::all()->filter(function($trabajo) {
                if (Carbon::now()->between($trabajo->fecha_inicio, $trabajo->fecha_termino)) {
                  return $trabajo;
                }
              }),
        ]);

    }

    //Invoca a vista en donde permite mostrar la cantidad de trabajos realizados por empleado
    public function cantidadT(){

        $chart_options = [
            'chart_title' => 'Trabajos en el mes por área',
            'chart_type' => 'pie',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Trabajo',
            'relationship_name' => 'area',
            'group_by_field' => 'nombre',


            'filter_field' => 'fecha_termino',
            'filter_days' => 30,
            'filter_period' => 'month',
            'where_raw' => 'estado = "finalizado"',
        ];

        $chart = new LaravelChart($chart_options);

        $mes = Carbon::now('m');
        //dd(Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador', Trabajo::raw("COUNT(trabajos.rut_trabajador) as cantidad"))->where('estado', 'finalizado')->groupBy('rut_trabajador')->get());
        return view('plataforma.trabajos.cantidadT', compact('chart'))->with([
            'trabajos' => Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador', Trabajo::raw("COUNT(trabajos.rut_trabajador) as cantidad"))->where('estado', 'finalizado')->groupBy('rut_trabajador')->get(),
            'tipos' => Trabajo::whereMonth('fecha_termino', '=', $mes)->select('id_area', Trabajo::raw("COUNT(trabajos.id_area) as cantidad"))->where('estado', 'finalizado')->groupBy('id_area')->get(),
            'areas' => Area::all(),
        ]);
    }
    public function sueldos(){

        $mes = Carbon::now('m');
        //dd(Trabajo::whereMonth('fecha_termino', '=', $mes)->select('titulo', 'ciudad', 'pago', 'id', 'id_area')->where('estado', 'finalizado')->get());
        return view('plataforma.trabajos.sueldos')->with([
            'trabajos' => Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador','pago', Trabajo::raw("SUM(trabajos.pago) as sueldo"))->where('estado', 'finalizado')->groupBy('rut_trabajador')->get(),
            'detalles' => Trabajo::whereMonth('fecha_termino', '=', $mes)->select('rut_trabajador','titulo', 'ciudad', 'pago', 'id', 'id_area')->where('estado', 'finalizado')->get(),
            'trabajadores' => User::all(),
        ]);

    }

    //Invoca a vista en donde permite enlistar todos los trabajos en curso de cada empleado
    public function todosEnCurso(){

        return view('plataforma.trabajos.todosencurso')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite enlistar todos los trabajos finalizados
    public function finalizado(){

        return view('plataforma.trabajos.finalizados')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    //Invoca a vista en donde permite registrar un trabajo nuevo
    public function create(){
        return view('plataforma.trabajos.create')->with([
            'trabajadores' => User::all(), 'areas' => Area::all(),
        ]);
    }

    //Almacena el trabajo nuevo en la base de datos
    public function store(TrabajoRequest $request)
    {

        $trabajo = Trabajo::create(/*request()->all()*/
            $request->validated()
        );
        $trabajadores = User::all();
        foreach ($trabajadores as $trabajador) {
            if ($trabajador->rut == $trabajo->rut_trabajador) {
                Mail::to($trabajador->email)->queue(new TrabajoAsignadoMailable($trabajo));
            }
        }


        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo "' . $trabajo->titulo . '" fué creado exitosamente, además se envió un aviso al trabajador por email');
    }

    //Muestra en detalle los datos de un trabajo seleccionado
    public function show(Trabajo $trabajo){

        $inicio = Carbon::parse($trabajo->fecha_inicio)->format('d-m-Y H:i:s');
        $termino = Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i:s');
        return view('plataforma.trabajos.show')->with([
            'trabajo'=> $trabajo,
            'inicio' => $inicio,
            'termino' => $termino,
        ]);
    }

    //Invoca a vista en donde permite editar la información de un trabajo seleccionado
    public function edit(Trabajo $trabajo){
        $inicio = Carbon::parse($trabajo->fecha_inicio)->format('d-m-Y H:i');
        $termino = Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i');
        return view('plataforma.trabajos.edit')->with([
            'trabajo'=> $trabajo, 'trabajadores' => User::all(), 'areas' => Area::all(), 'inicio' => $inicio,
            'termino' => $termino,
        ]);
    }

    //Actualiza los datos de un trabajo existente y genera e-mail al usuario que está asociado a dicho trabajo
    public function update(TrabajoRequest $request, Trabajo $trabajo){

        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoActualizadoMailable($trabajo));
            }
        }
    $trabajo->update(/*request()->all()*/$request->validated());
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué editado exitosamente');
    }

    //Actualiza el estado de un trabajo a suspendido y genera e-mail notificando al trabajador asociado acerca del cambio
    public function suspender(TrabajoSuspenderRequest $request, Trabajo $trabajo){
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoSuspendidoMailable($trabajo, $request->motivo));
            }
        }
        $trabajo1 = Trabajo::where("id", $trabajo->id )->update(["estado" => $request->estado, "fecha_inicio" => $request->fecha_inicio, "fecha_termino" => $request->fecha_termino]);
        return redirect()->back()->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué suspendido exitosamente');
    }
    //Actualiza el estado de un trabajo a atrasado
    public function atrasar(Trabajo $trabajo){
        $trabajo = Trabajo::where("id", $trabajo->id )->update(["estado" => "atrasado"]);
    }

    //Actualiza el estado de un trabajo a cancelado y genera e-mail notificando al trabajador asociado acerca del cambio
    public function cancelar(TrabajoCancelarRequest $request, Trabajo $trabajo){
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoCanceladoMailable($trabajo, $request->motivo));
            }
        }
        $trabajo1 = Trabajo::where("id", $trabajo->id )->update(["estado" => $request->estado, "fecha_inicio" => $request->fecha_inicio, "fecha_termino" => $request->fecha_termino]);
        return redirect()->back()->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué cancelado exitosamente');
    }

    //Elimina un trabajo seleccionado de la base de datos
    public function destroy(Trabajo $trabajo){
        $trabajo->delete();
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo '.$trabajo->titulo.' fué eliminado exitosamente');
    }
}
