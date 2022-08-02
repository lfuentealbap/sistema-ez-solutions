@extends('layouts.app')

@section('content')
    <h1>Editar un trabajo</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.trabajos.create') }}"><i class="fas fa-file-plus"></i> Crear</a>

    @if ($trabajos->isEmpty())
        <div class="alert alert-warning">
            No hay trabajos registrados
        </div>
    @else

        <div class="table-responsive rounded" style="background-color: lightblue;">
            <table class="table table-bordered border-primary">
                <thead class="thead-light">
                    <tr>
                        <th>Trabajo</th>
                        <th>Descripcion</th>
                        <th>Empleado asignado</th>
                        <th>Fecha de finalización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajos as $trabajo)
                        <tr>

                            <td>{{ $trabajo->titulo }}</td>
                            <td>{{$trabajo->descripcion}}</td>
                            <td>{{$trabajo->trabajador->nombres}} {{$trabajo->trabajador->apellidos}}</td>
                            <td>{{$trabajo->fecha_termino}}</td>
                            <td>
                                @if($trabajo->estado == "en curso")
                                <span class="badge bg-primary">En curso</span>
                                @elseif ($trabajo->estado == "finalizado")
                                <span class="badge bg-success">Finalizado</span>
                                @elseif ($trabajo->estado == "suspendido")
                                <span class="badge bg-danger">Suspendido</span>
                                @elseif ($trabajo->estado == "cancelado")
                                <span class="badge bg-secondary">Cancelado</span>
                                @elseif ($trabajo->estado == "atrasado")
                                <span class="badge bg-warning">Atrasado</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.trabajos.show', [
                                    'trabajo' => $trabajo->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.trabajos.edit', [
                                    'trabajo' => $trabajo->id]) }}"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
