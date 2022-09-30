@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-center" >Vista de orden de trabajo</h2>
</div>
<br>
    <div class="container">
        <a class="btn btn-primary" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-left"></i> Volver </a>
        <a class="btn btn-success" href="{{ route('plataforma.ot.imprimir', [
            'ot' => $ot->id]) }}" role="button"><i class="fas fa-file-pdf"></i> Exportar a PDF</a>
    </div>
    <br>

    <div style="background-color: white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 80px;" alt="EZ"></img>
                </div>
                <div class="col">
                    <h3>ORDEN DE TRABAJO</h3>
                </div>
                <div class="col" style="border: 3px solid red; text-align: center">
                    <br>
                    <h5>Orden N°{{ $ot->id }} </h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <strong>Tipo requerimiento:</strong>
                    {{ $ot->tipo_requerimiento }}
                </div>
                <div class="col">

                </div>
                <div class="col">
                    <strong>Fecha:</strong> @php

                        echo \Carbon\Carbon::parse($ot->fecha)->format('d/m/Y');
                    @endphp
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row row-cols-2">
                <div class="col">
                    <strong>Nombre técnico: </strong>
                    <br>
                    {{ $ot->trabajador->nombres }} {{ $ot->trabajador->apellidos }}
                </div>
                <div class="col">
                    <strong>Nombre colaborador: </strong>
                    <br>
                    {{ $ot->nombre_colaborador }}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row row-cols-2">
                <div class="col">
                    <strong>Dirección: </strong>
                    <br>
                    {{ $ot->direccion }}
                </div>
                <div class="col">
                    <strong>Ciudad: </strong>
                    <br>
                    {{ $ot->ciudad }}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row row-cols-2">
                <div class="col">
                    <strong>Diagnóstico: </strong>
                    <br>
                    {{ $ot->detalles_equipo_antiguo }}
                </div>
                <div class="col">
                    <strong>Estado: </strong>
                    <br>
                    {{ $ot->detalles_equipo_nuevo }}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <strong>Descripcion de la solución: </strong>
                    <br>
                    {{ $ot->descripcion_solucion }}
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <strong>Observaciones: </strong>
                    <br>
                    {{ $ot->observaciones }}
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="container align-middle">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <img src="{{ asset($ot->firma.'.png') }}" alt="">
                <br>
                    <strong>Firma colaborador </strong>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>
@endsection
