@extends('layouts.app')

@section('content')
    <h1>Todos los gastos</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.gastos.create') }}"><i class="fas fa-file-plus"></i> Crear gasto</a>

    @if ($gastos->isEmpty())
        <div class="alert alert-warning">
            No hay gastos registrados
        </div>
    @else

        <div class="table-responsive rounded">
            <table class="table table-bordered">
                <thead >
                    <tr>
                        <th>Nombre del gasto</th>
                        <th>Tipo de gasto</th>
                        <th>Monto</th>
                        <th>Fecha del gasto</th>
                        <th>Trabajador asociado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gastos as $gasto)
                        <tr>
                            <td>{{$gasto->nombre_gasto}}</td>
                            <td>{{$gasto->tipo}}</td>
                            <td>${{$gasto->monto}}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($gasto->fecha_gasto)->format('d-m-Y');
                                @endphp
                            </td>
                            <td>{{$gasto->trabajador->nombres}} {{$gasto->trabajador->apellidos}}</td>


                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.gastos.show', [
                                    'gasto' => $gasto->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.gastos.edit', [
                                    'gasto' => $gasto->id]) }}"><i class="fas fa-edit"></i> Editar</a>
                                <form class="d-inline" action="{{route('plataforma.gastos.destroy', [
                                    'gasto' => $gasto->id])}}" method="post">
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
