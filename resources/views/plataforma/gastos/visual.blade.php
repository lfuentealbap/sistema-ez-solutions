@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Informe de los gastos del mes</h1>
    <div>
        <div class="container">
            <a class="btn btn-primary" href="{{ route('plataforma.gastos.imprimir') }}" role="button"><i class="fas fa-file-pdf"></i> Exportar a PDF</a>
        </div>
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th>Nombre del gasto</th>
                    <th>Tipo de gasto</th>
                    <th>Monto</th>
                    <th>Fecha del gasto</th>
                    <th>Trabajador asociado</th>

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



                    </tr>

                @endforeach

                <div>

                </div>
            </tbody>
        </table>
    </div>
    </div>
@endsection
