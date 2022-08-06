<?php

namespace App\Http\Controllers;

use App\Http\Requests\AprobarRequest;
use App\Http\Requests\CalculoCotizacionRequest;
use App\Http\Requests\CotizacionProductoRequest;
use App\Http\Requests\CotizacionRequest;
use App\Http\Requests\RechazarRequest;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\CotizacionProducto;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
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
        return view('plataforma.cotizaciones.index')->with([
            'cotizaciones' => Cotizacion::all(), 'clientes' => Cliente::all(),
        ]);

    }
    public function marcar(){
        //$products = DB::table('products')->get();
        //$products = Product::all();
        //dd($products);
        return view('plataforma.cotizaciones.marcar')->with([
            'cotizaciones' => Cotizacion::all(), 'clientes' => Cliente::all(),
        ]);

    }

    public function create(){

        $hoy=Carbon::now()->format('Y-m-d');

        return view('plataforma.cotizaciones.create')->with(['clientes' => Cliente::all(), 'hoy'=> $hoy, 'productos' => Producto::all()
        ]);;
    }

    public function store(CotizacionRequest $request){

    $cotizacion = Cotizacion::create(/*request()->all()*/$request->validated());

        //session()->flash('success', 'The new product with id '.$product->id.'was created');
        //return redirect()->back();
        return redirect()->route('plataforma.cotizaciones.continuacion',[
            'cotizacion'=> $cotizacion->id,//Product::findOrFail($product),
        ]);
    }
    public function continuacion(Cotizacion $cotizacion) {


        return view('plataforma.cotizaciones.continuacion')->with([
            'cotizacion'=> $cotizacion, 'productos' => Producto::all(), 'cotizacion_producto' => CotizacionProducto::all(), 'clientes'=> Cliente::all(),
        ]);
    }
    public function insertarProducto(CotizacionProductoRequest $request){
        $productos = Producto::all();

        foreach($productos as $producto){
            if($request->codigo_producto == $producto->codigo){
                $request->subtotal = ($request->cantidad) * ($producto->valor);
            }
        }

        $cotizacion_producto = new CotizacionProducto();
        $cotizacion_producto->id_cotizacion = $request->id_cotizacion;
        $cotizacion_producto->codigo_producto = $request->codigo_producto;
        $cotizacion_producto->cantidad = $request->cantidad;
        $cotizacion_producto->subtotal = $request->subtotal;
        $cotizacion_producto->save();

        $total = 0;
        $cp = CotizacionProducto::all();
        foreach($cp as $p){
            if($p->id_cotizacion == $cotizacion_producto->id_cotizacion){
                $total = $total + $p->subtotal;
            }
        }
        $iva = ($total)*0.19;
        $neto = $total - $iva;
        $cotizacion = Cotizacion::where("id", $cotizacion_producto->id_cotizacion )->update(["neto" => $neto, "iva" =>$iva, "total"=>$total]);

            return redirect()->route('plataforma.cotizaciones.continuacion',[
                'cotizacion'=> $cotizacion_producto->id_cotizacion,
            ]);
        }

    public function show(Cotizacion $cotizacion){


        return view('plataforma.cotizaciones.show')->with([
            'cotizacion'=> $cotizacion,'productos' => Producto::all(), 'cotizacion_producto' => CotizacionProducto::all(), 'clientes'=> Cliente::all(),
        ]);

    }

    public function aprobar(AprobarRequest $request, Cotizacion $cotizacion){

    $cotizacion->update(/*request()->all()*/$request->validated());
        return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué aprobada exitosamente');
    }
    public function rechazar(RechazarRequest $request, Cotizacion $cotizacion){

        $cotizacion->update(/*request()->all()*/$request->validated());
            return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué rechazada exitosamente');
        }
    public function update(CotizacionRequest $request, Cotizacion $cotizacion){

        $cotizacion->update(/*request()->all()*/$request->validated());
            return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué editado exitosamente');
        }

    public function destroy(Cotizacion $cotizacion){
        $cp = CotizacionProducto::all();
        foreach($cp as $p){
            if($p->id_cotizacion == $cotizacion->id){
                $p->delete();
            }
        }
        $cotizacion->delete();
        return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué eliminado exitosamente');
    }
    public function eliminarP(CotizacionProducto $cotizacion_producto){
        //$producto= Producto::findOrFail($producto->codigo);
        $id = $cotizacion_producto->id_cotizacion;
        $cotizacion_producto->delete();
        $total = 0;
        $cp = CotizacionProducto::all();
        foreach($cp as $p){
            if($p->id_cotizacion == $cotizacion_producto->id_cotizacion){
                $total = $total + $p->subtotal;
            }
        }
        $iva = ($total)*0.19;
        $neto = $total - $iva;
        $cotizacion = Cotizacion::where("id", $cotizacion_producto->id_cotizacion )->update(["neto" => $neto, "iva" =>$iva, "total"=>$total]);


        return redirect()->route('plataforma.cotizaciones.continuacion',[
            'cotizacion'=> $id,
        ]);
    }
}


