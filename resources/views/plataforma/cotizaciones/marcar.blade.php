@extends('layouts.app')

@section('content')
    <h1>Cotizaciones pendientes</h1>

    @if ($cotizaciones->isEmpty())
        <div class="alert alert-warning">
            No hay cotizaciones registradas
        </div>
    @else
        @php
            $contador=0;
        @endphp

        <div class="table-responsive rounded">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>Fecha creación</th>
                        <th>Fecha expiración</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotizaciones as $cotizacion)
                        @if ($cotizacion->estado == "pendiente")
                        <tr>
                            <td>{{$cotizacion->id}}</td>
                            <td>@php

                                echo \Carbon\Carbon::parse($cotizacion->fecha_creacion)->format('d-m-Y');
                            @endphp</td>
                            <td>@php

                                echo \Carbon\Carbon::parse($cotizacion->fecha_expiracion)->format('d-m-Y');
                            @endphp</td>
                            <td>{{$cotizacion->cliente->nombre_completo}}</td>
                            <td>
                                @if($cotizacion->estado == "pendiente")
                                <span class="badge bg-warning text-darkbg-warning text-dark">Pendiente</span>
                                @elseif ($cotizacion->estado == "aprobado")
                                <span class="badge bg-success">Aprobado</span>
                                @elseif ($cotizacion->estado == "rechazado")
                                <span class="badge bg-danger">Rechazado</span>
                                @endif
                            </td>

                            <td>
                                <form action="{{route('plataforma.cotizaciones.aprobar', ['cotizacion' => $cotizacion->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                        <input type="hidden" class="form-control" name="estado" value="aprobado" required>

                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Aprobar</button>
                                </form>
                                <form action="{{route('plataforma.cotizaciones.rechazar', ['cotizacion' => $cotizacion->id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                        <input type="hidden" class="form-control" name="estado" value="rechazado" required>

                                        <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i> Rechazar</button>
                                </form>


                            </td>
                        </tr>
                        @php
                            $contador = $contador+1;
                        @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
            @if ($contador == 0)
            <div class="alert alert-warning">
                No hay cotizaciones pendientes por marcar
            </div>
            @endif
        </div>
    @endif

@endsection
