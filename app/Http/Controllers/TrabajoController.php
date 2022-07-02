<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabajoRequest;
use App\Models\Area;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function create(){
        return view('plataforma.trabajos.create')->with([
            'trabajador' => User::all(), 'areas' => Area::all(),
        ]);
    }

    public function store(TrabajoRequest $request){
        //return "Formulario para crear  un producto";
        /*$product = Product::create([
            'title' => request()->title,
            'description' => request()->description,
            'price' => request()->price,
            'stock' => request()->stock,
            'status' => request()->status,
        ]);*/

        /* Reglas estan en ProductRequest
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'price' => ['required','min:1'],
            'stock' => ['required','min:0'],
            'status' => ['required','in:available,unavailable'],
        ];

        request()->validate($rules);*/
        //if agregada a la funcion withValidator() de ProductRequest
        //if(/*request()*/$request->status == 'available' && /*request()*/$request->stock == 0){
            //session()->flash('error', 'If available must have stock');//en ves de flash era put
            //return redirect()->back()->withInput(request()->all())->withErrors('If available must have stock');
        //}
        //session()->forget('error');

    $trabajo = Trabajo::create(/*request()->all()*/$request->validated());

        //session()->flash('success', 'The new product with id '.$product->id.'was created');
        //return redirect()->back();
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo: '.$trabajo->titulo.' fué creado exitosamente');
    }

    public function show(Trabajo $trabajo){
        //$product = DB::table('products')->where('id', $product)->first();
        //$product = DB::table('products')->find($product);
        //Product $product sustituye; $product= Product::findOrFail($product); //originalmente es ::find
        //dd($product);

        return view('plataforma.trabajos.show')->with([
            'trabajos'=> $trabajo,
            'html' => "<h2>Subtitle</h2>",
        ]);
        //return "Mostrando producto con nombre {$product}";
    }

    public function edit(Trabajo $trabajo){

        return view('plataforma.trabajos.edit')->with([
            'trabajo'=> $trabajo, 'trabajador' => User::all(), 'areas' => Area::all(),//Product::findOrFail($product),
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
    $trabajo->update(/*request()->all()*/$request->validated());
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo: '.$trabajo->titulo.' fué editado exitosamente');
    }

    public function destroy(Trabajo $trabajo){
        //$product= Product::findOrFail($product);
        $trabajo->delete();
        return redirect()->route('plataforma.trabajos.index')->withSuccess('El trabajo '.$trabajo->titulo.' fué eliminado exitosamente');
    }
}
