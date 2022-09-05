<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de trabajo</title>
</head>

<body style="background-color: white;">

    <div style="display:table; vertical-align: middle;">
        <div
            style="float:left; font-family: Arial, Helvetica, sans-serif; font-size: 20px; vertical-align: middle; color:darkturquoise;">
            <img src="{{ asset('img/inicio/logo.png') }}" style="height: 50px;" alt="EZ">
        </div>
        <div
            style="margin:0px auto; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;margin-right: auto; margin-left: auto; text-align: center;">
            <h3>ORDEN DE TRABAJO</h3>
        </div>
        <div
            style="border: 3px solid red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; width:150px; height:55px; float:right">
            <h5>Orden N°{{ $ot->id }} </h5>
        </div>

    </div>
    <br>
    <br>

    <div style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%; border: 1px solid white;">
            <strong>Tipo requerimiento:</strong>
            {{ $ot->tipo_requerimiento }}
        </div>
        <div style="width: 50%;border: 1px solid white; margin-right: auto;">
            <strong>Fecha:</strong> @php

                echo \Carbon\Carbon::parse($ot->fecha)->format('d/m/Y');
            @endphp
        </div>
    </div>

    <br>

    <div style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Nombre técnico: </strong></div>
            {{ $ot->trabajador->nombres }} {{ $ot->trabajador->apellidos }}
        </div>
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white; float:right;"><strong>Nombre colaborador:
                </strong></div>
            {{ $ot->nombre_colaborador }}
        </div>
    </div>
    <div style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white; "><strong>Dirección: </strong></div>
            {{ $ot->direccion }}
        </div>
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;float:right"><strong>Ciudad: </strong></div>
            {{ $ot->ciudad }}
        </div>
    </div>
    <div style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Detalles equipo antiguo: </strong>
            </div>
            {{ $ot->detalles_equipo_antiguo }}
        </div>
        <div style="width: 50%;border: 1px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;float:right"><strong>Detalles equipo nuevo:
                </strong></div>
            {{ $ot->detalles_equipo_nuevo }}
        </div>
    </div>
    </div>

    <br>
    <div style="border-collapse: collapse; display: block; font-family: Arial, Helvetica, sans-serif; height: 200px;">
        <div style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Descripcion de la solución: </strong>
            </div>
            {{ $ot->descripcion_solucion }}
        </div>
    </div>

    <br>

    <div style="border-collapse: collapse; display: block; font-family: Arial, Helvetica, sans-serif; height: 200px;">
        <div style="width: 100%; border: 2px solid rgb(0, 145, 255);">
            <div style="background-color: rgb(0, 145, 255); color: white;"><strong>Observaciones: </strong>
            </div>
            {{ $ot->observaciones }}
        </div>
    </div>
    <br>
    <div style="display: block;margin-left: auto; margin-right: auto; font-size: 16px; text-align: center; font-family: Arial, Helvetica, sans-serif;">
        <div>
            <img src="{{ asset($ot->firma . '.png') }}" alt="firma" height="200px">
<br>
            <strong style="border-top: 1px solid black;">Firma colaborador </strong>
        </div>

    </div>



</body>

</html>
