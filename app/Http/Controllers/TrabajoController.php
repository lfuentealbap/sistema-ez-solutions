<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajoRequest;
use App\Http\Requests\TrabajoSuspenderRequest;
use App\Mail\TrabajoActualizadoMailable;
use App\Mail\TrabajoAsignadoMailable;
use App\Mail\TrabajoSuspendidoMailable;
use App\Models\Area;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class TrabajoController extends Controller
{
    ////
    public function __construct()
    {
        $this->middleware('auth');//->only('index'); ->except(['index','create']);
    }

    public function index(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.index')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function editar(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.editar')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function suspenderT(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.suspender')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function enCurso(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.encurso')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function misTrabajos(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.mistrabajos')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function hoy(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.trabajoshoy')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function todosEnCurso(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.todosencurso')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }
    public function finalizado(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.trabajos.finalizados')->with([
            'trabajos' => Trabajo::all(),
        ]);

    }

    public function create(){
        return view('plataforma.trabajos.create')->with([
            'trabajadores' => User::all(), 'areas' => Area::all(),
        ]);
    }

    public function store(TrabajoRequest $request){


    $trabajo = Trabajo::create(/*request()->all()*/$request->validated());
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->queue(new TrabajoAsignadoMailable($trabajo));
            }
        }


        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo "'.$trabajo->titulo.'" fué creado exitosamente, además se envió un aviso al trabajador por email');
    }

    public function show(Trabajo $trabajo){
        //$product = DB::table('products')->where('id', $product)->first();
        //$product = DB::table('products')->find($product);
        //Product $product sustituye; $product= Product::findOrFail($product); //originalmente es ::find
        //dd($product);
        $inicio = Carbon::parse($trabajo->fecha_inicio)->format('d-m-Y H:i:s');
        $termino = Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i:s');
        return view('plataforma.trabajos.show')->with([
            'trabajo'=> $trabajo,
            'inicio' => $inicio,
            'termino' => $termino,
        ]);
        //return "Mostrando producto con nombre {$product}";
    }

    public function edit(Trabajo $trabajo){
        $inicio = Carbon::parse($trabajo->fecha_inicio)->format('d-m-Y H:i');
        $termino = Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i');
        return view('plataforma.trabajos.edit')->with([
            'trabajo'=> $trabajo, 'trabajadores' => User::all(), 'areas' => Area::all(), 'inicio' => $inicio,
            'termino' => $termino,//Product::findOrFail($product),
        ]);
    }

    public function update(TrabajoRequest $request, Trabajo $trabajo){
        //return "Actualizando producto con nombre {$product}";
        /* Las siguientes reglas estan en ProductRequest
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];

        request()->validate($rules);*/

        //$product= Product::findOrFail($product);
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoActualizadoMailable($trabajo));
            }
        }
    $trabajo->update(/*request()->all()*/$request->validated());
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué editado exitosamente');
    }
    public function suspender(TrabajoSuspenderRequest $request, Trabajo $trabajo){
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoSuspendidoMailable($trabajo));
            }
        }
        $trabajo->update($request->validated());
        return redirect()->back()->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué suspendido exitosamente');
    }
    public function cancelar(TrabajoSuspenderRequest $request, Trabajo $trabajo){
        $trabajadores = User::all();
        foreach($trabajadores as $trabajador){
            if($trabajador->rut == $trabajo->rut_trabajador){
                Mail::to($trabajador->email)->send(new TrabajoSuspendidoMailable($trabajo));
            }
        }
        $trabajo->update($request->validated());
        return redirect()->back()->withSuccess('El trabajo: "'.$trabajo->titulo.'" fué cancelado exitosamente');
    }

    public function destroy(Trabajo $trabajo){
        //$product= Product::findOrFail($product);
        $trabajo->delete();
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo '.$trabajo->titulo.' fué eliminado exitosamente');
    }
}
