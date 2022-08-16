@extends('layouts.app')

@section('content')
    <h1>Cancelar trabajos</h1>

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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajos as $trabajo)
                    @if ($trabajo->estado != "cancelado" && $trabajo->estado != "finalizado")
                        <tr>

                            <td>{{ $trabajo->titulo }}</td>
                            <td>{{$trabajo->descripcion}}</td>
                            <td>{{$trabajo->trabajador->nombres}} {{$trabajo->trabajador->apellidos}}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i');
                                @endphp
                                 </td>
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

                                @if ($trabajo->estado == "en curso" || $trabajo->estado == "atrasado")
                                    <form action="{{route('plataforma.trabajos.cancelar', ['trabajo' => $trabajo->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                            <input type="hidden" class="form-control" name="estado" value="cancelado" required>
                                            <input type="hidden" class="form-control" name="rut_trabajador" value="{{$trabajo->rut_trabajador}}" required>
                                                <input type="hidden" class="form-control" name="fecha_inicio" value="{{$trabajo->fecha_inicio}}" required>
                                                <input type="hidden"  class="form-control" name="fecha_termino" value="{{$trabajo->fecha_termino}}" required>

                                            <button type="submit" class="btn btn-warning"><i class="fas fa-align-slash"></i> Cancelar</button>
                                    </form>
                                @endif


                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
