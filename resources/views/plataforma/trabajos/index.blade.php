@extends('layouts.app')

@section('content')
<a class="btn btn-success mb-3" href="{{ route('plataforma.trabajos.create') }}"><i class="fas fa-file-plus"></i> Registrar nuevo trabajo</a>
    <div class="card">
        <div class="card-header">
            <h4>Lista de todos los trabajos registrados</h4>
        </div>
        <div class="card-body">

            @if ($trabajos->isEmpty())
                <div class="alert alert-warning">
                    No hay trabajos registrados
                </div>
            @else
                <div class="table-responsive rounded" >
                    <table class="table table-bordered border-primary" id="misTrabajosTodos" style="background-color: lightblue;">
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

                                    <td scope="col">{{ $trabajo->titulo }}</td>
                                    <td scope="col">{{ $trabajo->descripcion }}</td>
                                    <td scope="col">{{ $trabajo->trabajador->nombres }} {{ $trabajo->trabajador->apellidos }}</td>
                                    <td scope="col">@php

                                        echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i');
                                    @endphp </td>
                                    <td scope="col">
                                        @if ($trabajo->estado == 'en curso')
                                            <span class="badge bg-primary">En curso</span>
                                        @elseif ($trabajo->estado == 'finalizado')
                                            <span class="badge bg-success">Finalizado</span>
                                        @elseif ($trabajo->estado == 'suspendido')
                                            <span class="badge bg-danger">Suspendido</span>
                                        @elseif ($trabajo->estado == 'cancelado')
                                            <span class="badge bg-secondary">Cancelado</span>
                                        @elseif ($trabajo->estado == 'atrasado')
                                            <span class="badge bg-warning">Atrasado</span>
                                        @endif
                                    </td>
                                    <td scope="col">
                                        <a class="btn btn-info"
                                            href="{{ route('plataforma.trabajos.show', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"><i
                                                class="fas fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Ver trabajo"></i>Ver</a>
                                        <a class="btn btn-primary"
                                            href="{{ route('plataforma.trabajos.edit', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"><i
                                                class="fas fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Editar trabajo"></i>Editar</a>
                                        <form class="d-inline"
                                            action="{{ route('plataforma.trabajos.destroy', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Eliminar trabajo"><i class="fas fa-trash-alt"></i>Eliminar
                                                </button>
                                        </form>
                                        @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalSuspender{{ $trabajo->id }}"  data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Suspender trabajo"><i
                                                    class="fas fa-power-off"></i>Suspender</button>
                                        @endif
                                        @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#modalCancelar{{ $trabajo->id }}"  data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Cancelar trabajo"><i
                                                    class="fas fa-ban"></i>
                                                Cancelar</button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal -->
    @foreach ($trabajos as $trabajo)
        <div class="modal fade" id="modalCancelar{{ $trabajo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cancelar Trabajo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('plataforma.trabajos.cancelar', ['trabajo' => $trabajo->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" class="form-control" name="estado" value="cancelado" required>
                        <input type="hidden" class="form-control" name="rut_trabajador"
                            value="{{ $trabajo->rut_trabajador }}" required>
                        <input type="hidden" class="form-control" name="fecha_inicio" value="{{ $trabajo->fecha_inicio }}"
                            required>
                        <input type="hidden" class="form-control" name="fecha_termino"
                            value="{{ $trabajo->fecha_termino }}" required>

                        <div class="modal-body">
                            Por favor, indique el motivo para cancelar el trabajo <strong>{{ $trabajo->titulo }}</strong>
                            <textarea type="text" class="form-control" name="motivo" value="" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-warning">Cancelar este trabajo</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endforeach

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

