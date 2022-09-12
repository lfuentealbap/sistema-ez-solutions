@extends('layouts.app')

@section('content')
    <h1>Todas las cotizaciones</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.cotizaciones.create') }}"><i class="fas fa-file-plus"></i> Crear</a>

    @if ($cotizaciones->isEmpty())
        <div class="alert alert-warning">
            No hay cotizaciones registradas
        </div>
    @else

        <div class="table-responsive rounded">
            <table class="table table-bordered" id="misCotizaciones">
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
                        <tr>
                            <td>{{$cotizacion->id}}</td>
                            <td>@php

                                echo \Carbon\Carbon::parse($cotizacion->fecha_creacion)->format('d-m-Y');
                            @endphp </td>
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
                                <a class="btn btn-info" href="{{ route('plataforma.cotizaciones.show', [
                                    'cotizacion' => $cotizacion->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.cotizaciones.continuacion', [
                                    'cotizacion' => $cotizacion->id]) }}"><i class="fas fa-edit"></i> Editar</a>
                                <form class="d-inline" action="{{route('plataforma.cotizaciones.destroy', [
                                    'cotizacion' => $cotizacion->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
