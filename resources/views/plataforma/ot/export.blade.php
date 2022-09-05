<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de trabajo</title>
</head>

<body style="background-color: white;">

    <div style="width: 100%; display:flex; vertical-align: top;">
        <div
            style="margin-left: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; vertical-align: middle; color:darkturquoise;">
            <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 50px;" alt="EZ">
        </div>
        <div style="margin:0px auto; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            <h3>ORDEN DE TRABAJO</h3>
        </div>
        <div
            style="border: 3px solid red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; width:150px; height:55px; float: right; margin-right: 0;">
            <h5>Orden N°{{ $ot->id }} </h5>
        </div>

    </div>
    <br>
    <br>

    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%; border: 1px solid white;">
            <strong>Tipo requerimiento:</strong>
            {{ $ot->tipo_requerimiento }}
        </div>
        <div style="width: 50%;border: 1px solid white; float: right;">
            <strong>Fecha:</strong> @php

            echo \Carbon\Carbon::parse($ot->fecha)->format('d/m/Y');
            @endphp
        </div>
    </div>

    <br>

    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Nombre técnico: </strong></div>
            {{ $ot->trabajador->nombres }} {{ $ot->trabajador->apellidos }}
        </div>
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white; float: right;"><strong>Nombre colaborador: </strong></div>
            {{ $ot->nombre_colaborador }}
        </div>
    </div>
    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white; "><strong>Dirección: </strong></div>
            {{ $ot->direccion }}
        </div>
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;float: right;"><strong>Ciudad: </strong></div>
            {{ $ot->ciudad }}
        </div>
    </div>
    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Detalles equipo antiguo: </strong></div>
                {{ $ot->detalles_equipo_antiguo }}
            </div>
            <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
                <div style="background-color: rgb(0, 145, 255); color: white;float: right;"><strong>Detalles equipo nuevo: </strong></div>
                {{ $ot->detalles_equipo_nuevo }}
            </div>
        </div>
    </div>

<br>
    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif; height: 200px;">
        <div style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Descripcion de la solución: </strong></div>
                {{ $ot->descripcion_solucion }}
            </div>
        </div>

    <br>

    <div style="border-collapse: collapse; display: flex; font-family: Arial, Helvetica, sans-serif;height: 180px;">
        <div style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Observaciones: </strong></div>
                {{ $ot->observaciones }}
            </div>
        </div>

<br>
    <div style="display: flex; font-family: Arial, Helvetica, sans-serif;">
            <div style="margin-bottom: 0px auto;">
                <img src="{{ asset($ot->firma . '.png') }}" alt="firma" height="200px">
                <br>
                <strong style="border-top: 1px solid black;">Firma colaborador </strong>
            </div>

        </div>
    </div>


</body>

</html>
