@extends('layouts.app')

@section('content')
    <h1>Todos las órdenes de trabajo</h1>
    @if ($ot->isEmpty())
        <div class="alert alert-warning">
            No hay órdenes de trabajo registrados
        </div>
    @else
        @if (Auth::user()->rol == 'trabajador')
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
                    @php
                        $contadorOT = 0;
                    @endphp
                    @foreach ($ot as $orden_trabajo)
                        @if ($orden_trabajo->rut_trabajador == Auth:::user()->rut)
                        <tr>
                            <td>{{$orden_trabajo->id}}</td>
                            <td>{{$orden_trabajo->trabajo->titulo}}</td>
                            <td>{{$orden_trabajo->trabajador->nombres}} {{$orden_trabajo->trabajador->apellidos}}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($orden_trabajo->fecha)->format('d-m-Y');
                                @endphp
                            </td>


                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.ot.show', [
                                    'ot' => $orden_trabajo->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                    <a class="btn btn-success" href="{{ route('plataforma.ot.imprimir', [
                                        'ot' => $orden_trabajo->id]) }}" role="button"><i class="fas fa-file-pdf"></i> Exportar a PDF</a>


                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
                @if ($contadorOT == 0)
                    <div class="alert alert-warning">
                        <p>No hay ordenes de trabajo registrados</p>
                    </div>
                @endif
            </table>
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
                            <td>{{$orden_trabajo->trabajador->nombres}} {{$orden_trabajo->trabajador->apellidos}}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($orden_trabajo->fecha)->format('d-m-Y');
                                @endphp
                            </td>


                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.ot.show', [
                                    'ot' => $orden_trabajo->id]) }}"><i class="fas fa-eye"></i> Ver</a>
                                    <a class="btn btn-success" href="{{ route('plataforma.ot.imprimir', [
                                        'ot' => $orden_trabajo->id]) }}" role="button"><i class="fas fa-file-pdf"></i> Exportar a PDF</a>


                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        @endif


    @endif

@endsection
