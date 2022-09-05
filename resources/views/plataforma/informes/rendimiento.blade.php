<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de rendimiento del mes</title>

</head>

<body>
    <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 14px">
        <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 80px;" alt="EZ">{{__(' EZ Solutions')}}
    </div>
    <div style="text-align: center;">
        <h2>Informe de rendimiento del mes de @php
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
            } echo ' del '.$anio;
        @endphp </h2>
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
                    <tr style="border: 1px solid black;">
                        <th style="width: 60%; border: 1px solid black; padding: 5px;">Nombre del trabajador</th>
                        <th style="border: 1px solid black; padding: 5px;">Total trabajos</th>
                        <th style="border: 1px solid black; padding: 5px;">% equivalente general</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($trabajos as $trabajo)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->trabajador->nombres }} {{ $trabajo->trabajador->apellidos }}</td>
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->cantidad }}</td>
                            <td style="border: 1px solid black; padding: 5px;">@php
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
        <br>
        <div><h5>{{ $trabajador->nombres }} {{ $trabajador->apellidos }}:</h5></div>
        <div>
            <table class="table-responsive">
                <thead>
                    <tr style="border: 1px solid black;">
                        <th style="width: 60%; border: 1px solid black; padding: 5px;">Trabajo</th>
                        <th style="border: 1px solid black; padding: 5px;">Dirección</th>
                        <th style="border: 1px solid black; padding: 5px;">Fecha término</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($trabajos1 as $trabajo)
                        @if ($trabajo->trabajador->rut == $trabajador->rut)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->titulo }} </td>
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->direccion }}, {{ $trabajo->ciudad }}</td>
                            <td style="border: 1px solid black; padding: 5px;">@php

                                echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y');
                            @endphp</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
            <hr>
        @endforeach
    </div>

</body>




</html>
