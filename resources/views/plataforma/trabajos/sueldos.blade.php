@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Estimación de sueldos por trabajador en el mes</h4>
        </div>
        <div class="card-body">

            @if ($trabajos->isEmpty())
                <div class="alert alert-warning">
                    No hay trabajos registrados
                </div>
            @else
                <div class="table-responsive rounded" style="background-color: lightblue;">
                    <table class="table table-bordered border-primary">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre empleado</th>
                                <th>Sueldo estimado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $trabajo)

                                        <tr>

                                            <td>{{ $trabajo->trabajador->nombres }} {{ $trabajo->trabajador->apellidos }}
                                            </td>
                                            <td>${{ $trabajo->sueldo }}</td>
                                            <td><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#modalDetalle{{ $trabajo->rut_trabajador }}"><i
                                                        class="fas fa-eye"></i>
                                                    Ver detalles</button></td>
                                        </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>

    <!-- Modal -->
    @foreach ($trabajadores as $trabajador)
        <div class="modal fade" id="modalDetalle{{ $trabajador->rut }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalles de trabajos de {{ $trabajador->nombres }}
                            {{ $trabajador->apellidos }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive rounded">
                            <table class="table table-bordered">
                                <thead class="thead-light" style="padding-top; 2px;">
                                    <tr>
                                        <th>Trabajo</th>
                                        <th>Ubicación</th>
                                        <th>Tipo</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $suma = 0;
                                    @endphp

                                    @foreach ($detalles as $detalle)
                                        @if ($trabajador->rut == $detalle->rut_trabajador)
                                            <tr>
                                                <td>{{ $detalle->titulo }}</td>
                                                <td>{{ $detalle->ciudad }}</td>
                                                <td>{{ $detalle->area->nombre }} </td>
                                                <td>${{ $detalle->pago }}</td>
                                                @php
                                                    $suma = $suma + $detalle->pago;
                                                @endphp

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h5 class="border border-dark">Total: ${{ $suma }}</h5>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
