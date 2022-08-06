@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col"><a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i>
                Volver</a></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"> <a class="btn btn-primary" href="#" role="button"><i class="fas fa-file-pdf"></i>
                    Exportar a PDF</a></div>
        </div>
<br>

    <div class="card shadow-sm">
        <div class="card-header">
            <h2>Cotización n°{{ $cotizacion->id }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="cliente" class="col-sm-2 col-form-label">Cliente:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->nombre_completo }}" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="rut" class="col-sm-2 col-form-label">RUT Cliente:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->rut }}" disabled>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="valor" class="col-sm-2 col-form-label">Dirección:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->direccion }}" disabled>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Ciudad:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->ciudad }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->telefono }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->cliente->email }}" disabled>
                </div>
            </div>


            <br>

            <table class="table table-sm table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Subtotal</th>
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
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Total neto:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->neto }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">IVA:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->iva }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Descuento:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->descuento }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Total:</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="cliente"
                        value="{{ $cotizacion->descuento }}" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection
