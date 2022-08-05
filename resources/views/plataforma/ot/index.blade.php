@extends('layouts.app')

@section('content')
    <h1>Todos las órdenes de trabajo</h1>
    @if ($ot->isEmpty())
        <div class="alert alert-warning">
            No hay órdenes de trabajo registrados
        </div>
    @else

        <div class="table-responsive rounded">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th>Número de OT</th>
                        <th>Trabajo asociado</th>
                        <th>Trabajador asociado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($ot as $orden_trabajo)
                        <tr>
                            <td>{{$orden_trabajo->id}}</td>
                            <td>{{$orden_trabajo->trabajo->titulo}}</td>
                            <td>${{$orden_trabajo->trabajador->nombres}} {{$orden_trabajo->trabajador->apellidos}}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($orden_trabajo->fecha)->format('d-m-Y');
                                @endphp
                            </td>


                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.ot.show', [
                                    'ot' => $orden_trabajo->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.ot.edit', [
                                    'ot' => $orden_trabajo->id]) }}"><i class="fas fa-edit"></i> Editar</a>
                                <form class="d-inline" action="{{route('plataforma.ot.destroy', [
                                    'ot' => $orden_trabajo->id])}}" method="post">
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
