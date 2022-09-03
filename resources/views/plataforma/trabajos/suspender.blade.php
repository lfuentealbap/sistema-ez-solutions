@extends('layouts.app')

@section('content')
    <h1>Suspender trabajos</h1>

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
                        @if ($trabajo->estado == "en curso" || $trabajo->estado == "atrasado")
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
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalSuspender{{ $trabajo->id }}"><i
                                    class="fas fa-power-off"></i>Suspender</button>
                                @endif


                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    @foreach ($trabajos as $trabajo)
    <div class="modal fade" id="modalSuspender{{ $trabajo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Suspender Trabajo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('plataforma.trabajos.suspender', ['trabajo' => $trabajo->id]) }}"
                    method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" class="form-control" name="estado" value="suspendido" required>
                    <input type="hidden" class="form-control" name="rut_trabajador"
                        value="{{ $trabajo->rut_trabajador }}" required>
                    <input type="hidden" class="form-control" name="fecha_inicio"
                        value="{{ $trabajo->fecha_inicio }}" required>
                    <input type="hidden" class="form-control" name="fecha_termino"
                        value="{{ $trabajo->fecha_termino }}" required>

                    <div class="modal-body">
                        Por favor, indique el motivo para suspender el trabajo <strong>{{ $trabajo->titulo }}</strong>
                        <textarea type="text" class="form-control" name="motivo" value="" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <button type="submit" class="btn btn-warning">Suspender este trabajo</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endforeach
@endsection
