<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de rendimiento del mes</title>
    <style>
        .pie-chart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .borde {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 80px;" alt="EZ"> EZ Solutions
    </div>
    <div class="text-center">
        <h1>Informe de rendimiento del mes de @php
            $mes = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('m');
            $anio = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y');
            if($mes == '01'){
                echo "Enero";
            }
            if($mes == '02'){
                echo "Febrero";
            }
            if($mes == '03'){
                echo "Marzo";
            }
            if($mes == '04'){
                echo "Abril";
            }
            if($mes == '05'){
                echo "Mayo";
            }
            if($mes == '06'){
                echo "Junio";
            }
            if($mes == '07'){
                echo "Julio";
            }
            if($mes == '08'){
                echo "Agosto";
            }
            if($mes == '09'){
                echo "Septiembre";
            }
            if($mes == '10'){
                echo "Octubre";
            }
            if($mes == '11'){
                echo "Noviembre";
            }
            if($mes == '12'){
                echo "Diciembre";
            } echo 'del '.$anio;
        @endphp </h1>
        @php
            $total = 0;
        @endphp
        @foreach ($trabajos as $trabajo)
            @php
                $total = $total + $trabajo->cantidad;
            @endphp
        @endforeach
        <div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th style="width: 60%;">Nombre del trabajador</th>
                        <th>Total trabajos</th>
                        <th>% equivalente general</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($trabajos as $trabajo)
                        <tr>
                            <td>{{ $trabajo->trabajador->nombres }} {{ $trabajo->trabajador->apellidos }}</td>
                            <td>{{ $trabajo->cantidad }}</td>
                            <td>@php
                                $porcentaje = ($trabajo->cantidad*100)/$total;
                                echo round($porcentaje, 2).'%'
                            @endphp</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <br>
    <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
    <h4>Trabajos realizados por empleado en el mes</h4>
    </div>

        @foreach ($trabajadores as $trabajador)
        @if ($trabajador->rol == 'jefe' || $trabajador->rol == 'trabajador')
        <hr>
        <div><h6>{{ $trabajador->nombres }} {{ $trabajador->apellidos }}:</h6></div>
        <div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th style="width: 60%;">Trabajo</th>
                        <th>Dirección</th>
                        <th>Fecha término</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($trabajos as $trabajo)
                        @if ($trabajo->trabajador->rut == $trabajador->rut)
                        <tr>
                            <td>{{ $trabajo->titulo }} </td>
                            <td>{{ $trabajo->direccion }}, {{ $trabajo->ciudad }}</td>
                            <td>@php

                                echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y');
                            @endphp</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif

        @endforeach
    </div>

</body>




</html>
