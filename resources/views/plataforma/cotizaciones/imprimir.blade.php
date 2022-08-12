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
        <div>
            <div>
                <div ">
                    <img src="{{ asset('img/inicio/logo.png') }}" style="width: 100px; height: 80px;" alt="EZ"></img>
                </div>
                <div >
                    <h3>COTIZACIÓN DE SERVICIO</h3>
                </div>
                <div  style="border: 3px solid red; text-align: center">
                    <br>
                    <h5>COTIZACIÓN N°{{ $cotizacion->id }} </h5>
                </div>
            </div>
        </div>
        <div >
            <div >
                <div >

                </div>
                <div >

                </div>
                <div >
                    <strong>Fecha:</strong> @php

                        echo \Carbon\Carbon::parse($cotizacion->fecha_creacion)->format('d/m/Y');
                    @endphp
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div  style="border: 1px solid black;">
            <div >
                <div >
                    <strong>Nombre:</strong> Eduardo Zambrano
                </div>
            </div>
            <div >
                <div >
                    <strong>Dirección:</strong> Cerro Murrinumo 462
                </div>
            </div>
            <div >
                <div >
                    <strong>Ciudad:</strong> Chillán
                </div>
            </div>
            <div >
                <div >
                    <strong>Teléfono:</strong> +56987339973
                </div>
            </div>
            <div >
                <div >
                    <strong>E-mail:</strong> soporte@ezsolutions.cl
                </div>
            </div>
        </div>
        <br>
        <div  style="border: 1px solid black;">
            <div >
                <div >
                    <strong>Nombre Cliente: </strong>

                    {{ $cotizacion->cliente->nombre_completo }}
                </div>
            </div>
            <div >
                <div >
                    <strong>Dirección Cliente: </strong>

                    {{ $cotizacion->cliente->direccion }}
                </div>
            </div>
            <div >
                <div >
                    <strong>Ciudad Cliente: </strong>

                    {{ $cotizacion->cliente->ciudad }}
                </div>
            </div>
            <div >
                <div >
                    <strong>Teléfono Cliente: </strong>

                    {{ $cotizacion->cliente->telefono }}
                </div>
            </div>
            <div >
                <div >
                    <strong>E-mail Cliente: </strong>

                    {{ $cotizacion->cliente->email }}
                </div>
            </div>
        </div>
        <br>
        <table >
            <thead>
                <tr>
                    <th >Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>

                 @foreach ($cotizacion_producto as $cp)
                    <tr>
                        <td> {{ $cp->codigo_producto }} </td>
                        @foreach ($productos as $producto)
                            @if ($cp->codigo_producto == $producto->codigo)
                                <td> {{ $producto->nombre }} </td>
                            @endif
                        @endforeach
                        <td> {{ $cp->cantidad }} </td>
                        @foreach ($productos as $producto)
                            @if ($cp->codigo_producto == $producto->codigo)
                                <td> {{ $producto->valor }} </td>
                            @endif
                        @endforeach
                        <td> {{ $cp->subtotal }} </td>

                    </tr>
                    @endforeach
                    </table>
                    <br>
                    <div style="border: 1px solid black;">
                        <div>
                            <div></div>
                            <div></div>
                            <div>
                                <strong>Neto: </strong>${{ $cotizacion->neto }}
                                <br>
                                <strong>IVA: </strong>${{ $cotizacion->iva }}
                                <br>
                                <strong>Descuentos: </strong>${{ $cotizacion->descuento }}
                                <br>
                                <strong>Total: </strong>${{ $cotizacion->total }}
                            </div>
                        </div>


                    </div>
                    <br>

                </div>
</body>

</body>


</html>
