@extends('layouts.app')

@section('content')

    @if (Auth::user()->rol == 'jefe')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Cantidad de trabajos realizados por empleado</h4>
                </div>
                @php
                    $contadorT = 0;
                @endphp

                <div class="table-responsive rounded" style="background-color: lightblue;">
                    <table class="table table-bordered border-primary">
                        <thead class="thead-light">
                            <tr>
                                <th>Trabajo</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Fecha de finalización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $trabajo)
                                @if ($trabajo->estado == 'en curso')
                                    <tr>

                                        <td>{{ $trabajo->titulo }}</td>
                                        <td>{{ $trabajo->descripcion }}</td>
                                        <td>
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
                                        <td>@php

                                            echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y H:i');
                                        @endphp</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ route('plataforma.trabajos.show', [
                                                    'trabajo' => $trabajo->id,
                                                ]) }}"><i
                                                    class="fas fa-eye"></i> Ver</a>


                                        </td>
                                    </tr>
                                    @php
                                        $contadorT = $contadorT + 1;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @if ($contadorT == 0)
                    <div class="alert alert-warning">
                        <p>No hay trabajos registrados</p>
                    </div>
                @endif
            </div>

        </div>

@endif
        </div>
    @endsection
