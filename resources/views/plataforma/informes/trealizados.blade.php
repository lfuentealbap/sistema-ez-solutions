<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de trabajos realizados</title>

</head>

<body>
    <div
        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 20px; vertical-align: middle; color:darkturquoise;">
        <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 80px;"
            alt="EZ">{{ __(' Servicios informáticos') }}
    </div>
    <div style="text-align: center;">
        <h2>Informe de trabajos realizados en @php
            $mes = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('m');
            $anio = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y');
            if ($mes == '01') {
                echo 'Enero';
            }
            if ($mes == '02') {
                echo 'Febrero';
            }
            if ($mes == '03') {
                echo 'Marzo';
            }
            if ($mes == '04') {
                echo 'Abril';
            }
            if ($mes == '05') {
                echo 'Mayo';
            }
            if ($mes == '06') {
                echo 'Junio';
            }
            if ($mes == '07') {
                echo 'Julio';
            }
            if ($mes == '08') {
                echo 'Agosto';
            }
            if ($mes == '09') {
                echo 'Septiembre';
            }
            if ($mes == '10') {
                echo 'Octubre';
            }
            if ($mes == '11') {
                echo 'Noviembre';
            }
            if ($mes == '12') {
                echo 'Diciembre';
            }
            echo ' del ' . $anio;
        @endphp </h2>

        <br>
        <div>
            <table
                style="border-collapse: collapse; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                <thead style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <th style="border: 1px solid black; padding: 5px;">Nombre empleado</th>
                        <th style="border: 1px solid black; padding: 5px;">Trabajo</th>
                        <th style="border: 1px solid black; padding: 5px;">Dirección</th>
                        <th style="border: 1px solid black; padding: 5px;">Area</th>
                        <th style="border: 1px solid black; padding: 5px;">Fecha término</th>
                    </tr>
                </thead>

                <tbody style="border: 1px solid black;">

                    @foreach ($trabajos as $trabajo)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->trabajador->nombres }}
                                {{ $trabajo->trabajador->apellidos }} </td>
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->titulo }} </td>
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->direccion }},
                                {{ $trabajo->ciudad }}</td>
                            <td style="border: 1px solid black; padding: 5px;">{{ $trabajo->area->nombre }} </td>
                            <td style="border: 1px solid black; padding: 5px;">@php

                                echo \Carbon\Carbon::parse($trabajo->fecha_termino)->format('d-m-Y');
                            @endphp</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


</body>

</html>
