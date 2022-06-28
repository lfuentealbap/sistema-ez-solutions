<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotizacionRequest;
use App\Models\Cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//->only('index'); ->except(['index','create']);
    }

    public function index(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.productos.index')->with([
            'cotizaciones' => DB::table('cotizaciones')->get(),
        ]);

    }

    public function create(){
        return view('plataforma.productos.create');
    }

    public function store(CotizacionRequest $request){
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

    $cotizacion = Cotizacion::create(/*request()->all()*/$request->validated());

        //session()->flash('success', 'The new product with id '.$product->id.'was created');
        //return redirect()->back();
        return redirect()->route('plataforma.productos.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué creada exitosamente');
    }

    public function show(Cotizacion $cotizacion){
        //$producto = DB::table('productos')->where('codigo', $producto)->get();
        //$product = DB::table('products')->find($product);
        //Product $product sustituye; $product= Product::findOrFail($product); //originalmente es ::find
        //dd($producto);

        return view('plataforma.productos.show')->with([
            'cotizacion'=> $cotizacion,
            'html' => "<h2>Subtitle</h2>",
        ]);
        //return "Mostrando producto con nombre {$producto}";
    }

    public function edit(Cotizacion $cotizacion){

        return view('plataforma.productos.edit')->with([
            'cotizacion'=> $cotizacion,//Product::findOrFail($product),
        ]);
    }

    public function update(CotizacionRequest $request, Cotizacion $cotizacion){
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
    $cotizacion->update(/*request()->all()*/$request->validated());
        return redirect()->route('plataforma.productos.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué editado exitosamente');
    }

    public function destroy(Cotizacion $cotizacion){
        //$producto= Producto::findOrFail($producto->codigo);
        $cotizacion->delete();
        return redirect()->route('plataforma.productos.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué eliminado exitosamente');
    }
}


