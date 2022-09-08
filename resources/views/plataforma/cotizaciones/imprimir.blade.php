<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotización</title>
</head>

<body>
    <div style="background-color: white">
        <table style="width: 100%; overflow: visible ; vertical-align: middle;">
            <td
                style="width: 10%; float:left; font-family: Arial, Helvetica, sans-serif; font-size: 20px; vertical-align: middle; color:darkturquoise;">
                <img src="{{ asset('img/inicio/logo.png') }}" style="height: 50px; width: 60px" alt="EZ">
            </td>
            <td
                style="margin:0px auto; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;margin-right: auto; margin-left: auto; text-align: center;">
                <h3>COTIZACIÓN DE SERVICIO</h3>
            </td>
            <td
                style="border: 3px solid red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; width:200px; height:40px;">
                <h5>Cotización N°{{ $cotizacion->id }} </h5>
            </td>

        </table>
        <div>
            <table
                style="width: 100%; border-collapse: collapse; font-family: Arial, Helvetica, sans-serif; vertical-align: middle;">
                <td style="width: 50%; border: 1px solid white; text-align: left; margin-top: 0px auto;">
                    <strong></strong>
                </td>
                <td style="width: 50%;border: 1px solid white; text-align: right; margin-top: 0px auto;">
                    <strong>Fecha:</strong> @php

                        echo \Carbon\Carbon::parse($cotizacion->fecha_creacion)->format('d/m/Y');
                    @endphp
                </td>
            </table>
        </div>

        <div>
            <table
                style="font-family: Arial, Helvetica, sans-serif; vertical-align: top; height: 100%; font-size: 13px; border-collapse: collapse;">
                <thead>
                    <th style="width: 40%; background-color: darkturquoise; float:left">Datos empresa:</th>
                    <th></th>
                    <th style="width: 40%; background-color: darkturquoise; float:right">Datos cliente:</th>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Nombre:</strong> Eduardo Zambrano</td>
                        <td></td>
                        <td><strong>Nombre Cliente: </strong>
                            {{ $cotizacion->cliente->nombre_completo }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dirección:</strong> Cerro Murrinumo 462</td>
                        <td></td>
                        <td><strong>Dirección Cliente: </strong>
                            {{ $cotizacion->cliente->direccion }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Ciudad:</strong> Chillán</td>
                        <td></td>
                        <td> <strong>Ciudad Cliente: </strong>

                            {{ $cotizacion->cliente->ciudad }}</td>
                    </tr>
                    <tr>
                        <td><strong>Teléfono:</strong> +56987339973</td>
                        <td></td>
                        <td><strong>Teléfono Cliente: </strong>

                            {{ $cotizacion->cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <td><strong>E-mail:</strong> soporte@ezsolutions.cl</td>
                        <td></td>
                        <td><strong>E-mail Cliente: </strong>

                            {{ $cotizacion->cliente->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table style="border-collapse: collapse; width: 100%;">
                <thead style="font-family: Arial, Helvetica, sans-serif;">
                    <tr>
                        <th style="border: 2px solid black; width: 5%;">Código</th>
                        <th style="border: 2px solid black;">Nombre</th>
                        <th style="border: 2px solid black; width: 5%;">Cantidad</th>
                        <th style="border: 2px solid black; width: 20%;">Precio</th>
                        <th style="border: 2px solid black;width: 20%;">Subtotal</th>
                    </tr>
                </thead>
                <tbody style="border: 2px solid black; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">

                    @foreach ($cotizacion_producto as $cp)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;"> {{ $cp->codigo_producto }} </td>
                            @foreach ($productos as $producto)
                                @if ($cp->codigo_producto == $producto->codigo)
                                    <td style="border: 1px solid black;"> {{ $producto->nombre }} </td>
                                @endif
                            @endforeach
                            <td style="border: 1px solid black;"> {{ $cp->cantidad }} </td>
                            @foreach ($productos as $producto)
                                @if ($cp->codigo_producto == $producto->codigo)
                                    <td style="border: 1px solid black;"> ${{ $producto->valor }} </td>
                                @endif
                            @endforeach
                            <td style="border: 1px solid black;"> ${{ $cp->subtotal }} </td>

                        </tr>
                    @endforeach
            </table>
        </div>
        <hr>
        <div>
            <table
                style=" width: 100%; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 14px;">
                <td style="width: 70%;"></td>
                <td style="width: 30%; border: 3px solid black;">
                    <strong> Neto: </strong>${{ $cotizacion->neto }} <br>
                    <strong>IVA: </strong>${{ $cotizacion->iva }} <br>
                    <strong>Descuentos: </strong>${{ $cotizacion->descuento }} <br>
                    <strong>Total: </strong>${{ $cotizacion->total }}
                </td>
            </table>
        </div>

        <div>
            <table style=" width: 100%;">
                <thead>
                    <th
                        style="background-color: darkturquoise; font-family: Arial, Helvetica, sans-serif; border: 2px solid darkturquoise; float:left">
                        Términos y condiciones</th>
                    <th></th>
                </thead>
                <tbody>
                    <td
                        style="width: 60%; border: 2px solid darkturquoise; font-family: Arial, Helvetica, sans-serif; font-size: 12px; float:left">
                        <p>*Se debe abonar el 50% de la obra para comenzar el trabajo</p>
                        <p>Plazo de entrega 2 Dias hábiles</p>
                        @if ($cotizacion->iva == 0)
                            <p><i>Valor sin iva incluido</i></p>
                        @else
                            <p><i>Valor con iva incluido</i></p>
                        @endif
                        <p><strong>x</strong>____________________________</p>
                        <p>Nombre: </p>
                    </td>
                </tbody>


            </table>
        </div>

        <div style="text-align: center; font-family: Arial, Helvetica, sans-serif;font-size: 12px;">
            Si usted tiene alguna duda sobre esta cotización, por favor, póngase en contacto con nosotros <br>
            SERVICIOS INFORMATICOS | Teléfono: +56987339973 | E-mail: Soporte@ezsolutions.cl <br>
            <p style="color: blue;"> <i>Gracias por su preferencia !</i> </p>
        </div>
    </div>
</body>

</html>
