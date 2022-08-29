<?php

namespace App\Http\Controllers;

use App\Http\Requests\AprobarRequest;
use App\Http\Requests\CalculoCotizacionRequest;
use App\Http\Requests\CotizacionGuardarRequest;
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
use Barryvdh\DomPDF\Facade\Pdf;

class CotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('plataforma.cotizaciones.index')->with([
            'cotizaciones' => Cotizacion::all(), 'clientes' => Cliente::all(),
        ]);

    }
    public function marcar(){

        return view('plataforma.cotizaciones.marcar')->with([
            'cotizaciones' => Cotizacion::all(), 'clientes' => Cliente::all(),
        ]);

    }
    public function imprimir(Cotizacion $cotizacion){
        $productos = Producto::all();
        $cotizacion_producto = CotizacionProducto::all();
        $clientes = Cliente::all();
        $data = ['cotizacion' =>$cotizacion, 'productos' => $productos, 'cotizacion_producto' =>$cotizacion_producto, 'clientes' => $clientes];

        $pdf = PDF::loadView('plataforma.cotizaciones.imprimir', $data);
        return $pdf->download('Cotizacion_'.$cotizacion->id.'.pdf');
    }

    public function create(){

        $hoy=Carbon::now()->format('Y-m-d');

        return view('plataforma.cotizaciones.create')->with(['clientes' => Cliente::all(), 'hoy'=> $hoy, 'productos' => Producto::all()
        ]);;
    }

    public function store(CotizacionRequest $request){

    $cotizacion = Cotizacion::create($request->validated());

        return redirect()->route('plataforma.cotizaciones.continuacion',[
            'cotizacion'=> $cotizacion->id,
        ]);
    }
    public function continuacion(Cotizacion $cotizacion) {


        return view('plataforma.cotizaciones.continuacion')->with([
            'cotizacion'=> $cotizacion, 'productos' => Producto::all(), 'cotizacion_producto' => CotizacionProducto::all()->where('id_cotizacion', $cotizacion->id), 'clientes'=> Cliente::all(),
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

    $cotizacion->update($request->validated());
        return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué aprobada exitosamente');
    }
    public function rechazar(RechazarRequest $request, Cotizacion $cotizacion){

        $cotizacion->update($request->validated());
            return redirect()->route('plataforma.cotizaciones.index')->withSuccess('La cotización n°'.$cotizacion->id.' fué rechazada exitosamente');
        }
    public function update(CotizacionRequest $request, Cotizacion $cotizacion){

        $cotizacion->update($request->validated());
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
    public function guardar(CotizacionGuardarRequest $request, Cotizacion $cotizacion){

        $total = $cotizacion->total;
        $descuento = $total *($request->descuento/100);
        if ($request->apiva == "si"){
            $iva = ($total)*0.19;
        }else{
            $iva = ($total)*0;
        }

        $neto = $total - ($total*0.19);
        $total = $neto + $iva - $descuento;
        $cotizacion_g = Cotizacion::where("id", $cotizacion->id )->update(["neto" => $neto, "iva" =>$iva, "descuento" =>$descuento, "total"=>$total]);

        return redirect()->route('plataforma.cotizaciones.show', [
            'cotizacion' => $cotizacion->id ]);
    }
    public function eliminarP(CotizacionProducto $cotizacion_producto){

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


