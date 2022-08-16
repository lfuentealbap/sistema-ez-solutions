<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de los gastos del mes</title>
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
    <div class="text-center">
        <h1>Informe de los gastos del mes</h1>
        <div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>Nombre del gasto</th>
                        <th>Tipo de gasto</th>
                        <th>Monto</th>
                        <th>Fecha del gasto</th>
                        <th>Trabajador asociado</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto->nombre_gasto }}</td>
                            <td>{{ $gasto->tipo }}</td>
                            <td>${{ $gasto->monto }}</td>
                            <td>
                                @php

                                    echo \Carbon\Carbon::parse($gasto->fecha_gasto)->format('d-m-Y');
                                @endphp
                            </td>
                            <td>{{ $gasto->trabajador->nombres }} {{ $gasto->trabajador->apellidos }}</td>
                            @php
                                $total = $total + $gasto->monto;
                            @endphp


                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <br>
    <div class="borde">
        Total ${{ $total }}
    </div>
</body>




</html>
