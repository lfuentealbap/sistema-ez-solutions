<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de trabajo</title>
</head>

<body style="background-color: white;">

    <table style="width: 100%; overflow: visible ; vertical-align: middle;">
        <td
            style="width: 10%; float:left; font-family: Arial, Helvetica, sans-serif; font-size: 20px; vertical-align: middle; color:darkturquoise;">
            <img src="{{ asset('img/inicio/logo.png') }}" style="height: 50px;" alt="EZ">
        </td>
        <td
            style="margin:0px auto; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;margin-right: auto; margin-left: auto; text-align: center;">
            <h3>ORDEN DE TRABAJO</h3>
        </td>
        <td
            style="width: 20%; border: 3px solid red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; width:150px; height:55px;">
            <h5>Orden N°{{ $ot->id }} </h5>
        </td>

    </table>
    <br>
    <br>

    <table
        style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif; vertical-align: middle;">
        <td style="width: 50%; border: 1px solid white; text-align: left; margin-top: 0px auto;">
            <strong>Tipo requerimiento:</strong>
            {{ $ot->tipo_requerimiento }}
        </td>
        <td style="width: 50%;border: 1px solid white; text-align: right; margin-top: 0px auto;">
            <strong>Fecha:</strong> @php

            echo \Carbon\Carbon::parse($ot->fecha)->format('d/m/Y');
            @endphp
        </td>
    </table>

    <br>

    <table style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <thead style=" border: 1px solid rgb(0, 145, 255); text-align: left;">
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Nombre técnico:
                </strong></th>
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Nombre
                    colaborador:
                </strong></th>
        </thead>
        <tbody style=" border: 1px solid rgb(0, 145, 255);">
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->trabajador->nombres }} {{
                $ot->trabajador->apellidos }}</td>
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->nombre_colaborador }}</td>
        </tbody>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <thead style=" border: 1px solid rgb(0, 145, 255); text-align: left;">
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Dirección:
                </strong></th>
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Ciudad:
                </strong></th>
        </thead>
        <tbody style=" border: 1px solid rgb(0, 145, 255);">
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->direccion }}</td>
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->ciudad }}</td>
        </tbody>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <thead style=" border: 1px solid rgb(0, 145, 255); text-align: left;">
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Detalles equipo antiguo:
                </strong></th>
            <th style="background-color: rgb(0, 145, 255); color: white;width: 50%;"><strong>Detalles equipo
                    nuevo:
                </strong></th>
        </thead>
        <tbody style=" border: 1px solid rgb(0, 145, 255);">
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->detalles_equipo_antiguo }}</td>
            <td style=" border: 1px solid rgb(0, 145, 255);">{{ $ot->detalles_equipo_nuevo }}</td>
        </tbody>
    </table>
    <br>
    <table style="width: 100%;border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <thead style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <th style="width: 100%;background-color: rgb(0, 145, 255); color: white;"><strong>Descripcion de la
                    solución: </strong>
            </th>
        </thead>
        <tbody style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <td style="width: 100%; border: 2px solid rgb(0, 145, 255);">{{ $ot->descripcion_solucion }}</td>
        </tbody>
    </table>

    <br>
    <table style="width: 100%;border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <thead style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <th style="width: 100%;background-color: rgb(0, 145, 255); color: white;"><strong>Observaciones: </strong>
            </th>
        </thead>
        <tbody style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <td style="width: 100%; border: 2px solid rgb(0, 145, 255);">{{ $ot->observaciones }}</td>
        </tbody>
    </table>

    <br>




</body>
<footer
        style="display: block;margin-bottom: auto ;margin-left: auto; margin-right: auto; font-size: 16px; text-align: center; font-family: Arial, Helvetica, sans-serif;">
        <div>
            <img src="{{ asset($ot->firma . '.png') }}" alt="firma" height="200px">
            <br>
            <strong style="border-top: 1px solid black;">Firma colaborador </strong>
        </div>

</footer>
</html>
