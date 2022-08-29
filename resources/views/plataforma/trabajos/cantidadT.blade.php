@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Trabajos por empleado en el periodo</h4>
        </div>
        <div class="card-body">

            @if ( $trabajos->isEmpty() )
                <div class="alert alert-warning">
                    No hay trabajos registrados
                </div>
            @else
                <div class="table-responsive rounded" style="background-color: lightblue;">
                    <table class="table table-bordered border-primary">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre empleado</th>
                                <th>Cantidad de trabajos realizados</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $trabajo)
                                <tr>

                                    <td>{{ $trabajo->trabajador->nombres }} {{ $trabajo->trabajador->apellidos }}</td>
                                    <td>{{ $trabajo->cantidad }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="container" style="width: 70%">
                <h3 style="text-align: center">{{ $chart->options['chart_title'] }}</h3>
                    {!! $chart->renderHtml() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}

@endsection
