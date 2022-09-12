<?php

namespace App\Http\Controllers;

use App\Http\Requests\OTRequest;
use App\Models\Area;
use App\Models\OT;
use App\Models\Trabajo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OTController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plataforma.ot.index')->with([
            'ot' => OT::all(),
        ]);
    }
    public function editar()
    {
        return view('plataforma.ot.editar')->with([
            'ot' => OT::all(),
        ]);
    }
    public function eliminar()
    {
        return view('plataforma.ot.eliminar')->with([
            'ot' => OT::all(),
        ]);
    }

    public function imprimir(OT $ot){
        $data = ['ot' => $ot];
        //dd($data);
        $pdf = PDF::loadView('plataforma.ot.export', $data);
     return $pdf->download('OT'.$ot->id.'.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trabajo $trabajo)
    {
        return view('plataforma.ot.create')->with([
            'trabajo' => $trabajo, 'areas' => Area::all(), 'ciudades'=> DB::table('ciudades')->orderBy('ciudad', 'ASC')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OTRequest $request)
    {
        $ot = OT::create($request->validated());
        //Guarda la firma en almacenamiento del servidor
        $img = str_replace('data:image/png;base64,', '', $request->base64);
        $fileData = base64_decode($img);
        $fileName = $ot->firma.'.png';
        file_put_contents($fileName, $fileData);
        $trabajo = Trabajo::where("id", $request->id_trabajo )->update(["estado" => $request->estado]);
        return redirect()->route('plataforma.ot.index')->withSuccess('La orden de trabajo n°'.$ot->id.' fué creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OT  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(OT $ot)
    {
        $fecha = Carbon::parse($ot->fecha)->format('d-m-Y');
        return view('plataforma.ot.show')->with([
            'ot'=> $ot, 'fecha' => $fecha,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OT  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(OT $ot)
    {
        return view('plataforma.ot.edit')->with([
            'ot'=> $ot, 'trabajos' => Trabajo::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OT  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(OTRequest $request, OT $ot)
    {
        $ot->update($request->validated());
        return redirect()->route('plataforma.ot.index')->withSuccess('La orden de trabajo n°'.$ot->id.' fué modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OT  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(OT $ot)
    {
        $ot->delete();
        return redirect()->back()->withSuccess('La orden de trabajo n°'.$ot->id.' ha sido eliminado');
    }
}
