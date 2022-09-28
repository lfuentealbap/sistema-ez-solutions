<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AprobarRequest;
use App\Http\Requests\CotizacionGuardarRequest;
use App\Http\Requests\CotizacionProductoRequest;
use App\Http\Requests\CotizacionRequest;
use App\Http\Requests\RechazarRequest;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\CotizacionProducto;
use App\Models\Producto;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index(){
        $cotizaciones = Cotizacion::all();
        return \response($cotizaciones);

    }

    public function imprimir(Cotizacion $cotizacion){
        $productos = Producto::all();
        $cotizacion_producto = CotizacionProducto::all();
        $clientes = Cliente::all();
        $data = ['cotizacion' =>$cotizacion, 'productos' => $productos, 'cotizacion_producto' =>$cotizacion_producto, 'clientes' => $clientes];

        $pdf = PDF::loadView('plataforma.cotizaciones.imprimir', $data);
        return $pdf->download('Cotizacion_'.$cotizacion->id.'.pdf');
    }


    public function store(CotizacionRequest $request){

    $cotizacion = Cotizacion::create($request->validated());

        return \response($cotizacion);
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

            return \response($cotizacion);
        }

    public function show(Cotizacion $cotizacion){

        $cotizacion = Cotizacion::findOrFail($cotizacion->id);
        return \response($cotizacion);

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

        $cotizacion = Cotizacion::findOrFail($cotizacion->id)->update($request->validated());
        return \response($cotizacion);
    }

    public function destroy(Cotizacion $cotizacion){
        $cotizacion = Cotizacion::destroy($cotizacion->id);
        return \response("Cotización eliminada");
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

        return \response($cotizacion);
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


        return \response($cotizacion);
    }
}
