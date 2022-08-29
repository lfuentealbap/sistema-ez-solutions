@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Cotización') }}</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="cliente" class="col-md-4 col-form-label text-md-end">Cliente:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fecha"
                                    value="{{ $cotizacion->cliente->nombre_completo }}" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">Direccion Cliente:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="direccion"
                                    value="{{ $cotizacion->cliente->direccion }}" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">Teléfono Cliente:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telefono"
                                    value="{{ $cotizacion->cliente->telefono }}" required disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Cliente:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email"
                                    value="{{ $cotizacion->cliente->email }}" required disabled>
                            </div>
                        </div>
                        <div class="container">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#insertarModal">
                                Agregar producto
                            </button>
                        </div>

                        <br>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Eliminar</th>
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
                                            <td>
                                                <form class="d-inline"
                                                    action="{{ route('plataforma.cotizaciones.eliminarP', [
                                                        'cotizacion_producto' => $cp->id,
                                                    ]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                            </table>
                        </div>


                        <form class="d-inline"
                            action="{{ route('plataforma.cotizaciones.guardar', [
                                'cotizacion' => $cotizacion->id,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="descuento" class="col-md-4 col-form-label text-md-end">Descuento(%):</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="descuento" value="0"
                                        step="0.01" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="apiva" class="col-md-4 col-form-label text-md-end">Desea aplicar el
                                    IVA?:</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="apiva" name="apiva">
                                        <option selected value="si">Si</option>
                                        <option value="no">No</option>

                                    </select>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">

                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col" style="border: 1px solid black; text-align: right">
                                        <strong>Neto:</strong> $@if ($cotizacion->neto == null)
                                            0
                                        @else
                                            {{ $cotizacion->neto }}
                                        @endif
                                        <br>
                                        <strong>IVA:</strong> $@if ($cotizacion->iva == null)
                                            0
                                        @else
                                            {{ $cotizacion->iva }}
                                        @endif
                                        <br>
                                        <strong>Descuento:</strong> $@if ($cotizacion->descuento == null)
                                            0
                                        @else
                                            {{ $cotizacion->descuento }}
                                        @endif
                                        <br>
                                        <strong>Total:</strong> $@if ($cotizacion->total == null)
                                            0
                                        @else
                                            {{ $cotizacion->total }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalDeshacer">
                                    Deshacer cotización</button>
                                @if ($cotizacion->total != null)
                                    <button type="submit" class="btn btn-success" data-bs-toggle="modal">
                                        Guardar cotización</button>
                                @endif

                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="insertarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insertar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('cotizaciones.insertar.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <input type="hidden" name="id_cotizacion" value="{{ $cotizacion->id }}">
                                <div class="col">
                                    <label for="codigo">Productos:</label>
                                    <div class="col-md-12">
                                        <select class="form-select" id="codigo_producto" name="codigo_producto">
                                            <option selected value="">Seleccione productos...</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->codigo }}">{{ $producto->nombre }} -
                                                    ${{ $producto->valor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="codigo">Cantidad:</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="cantidad" value="1"
                                            required>
                                        <input type="hidden" class="form-control" name="subtotal" value="">
                                        <input type="hidden" class="form-control" name="neto" value="">
                                        <input type="hidden" class="form-control" name="iva" value="">
                                        <input type="hidden" class="form-control" name="total" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Insertar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDeshacer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deshacer cotización</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Está segur@ de cancelar la creación de esta cotización?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form class="d-inline"
                        action="{{ route('plataforma.cotizaciones.destroy', [
                            'cotizacion' => $cotizacion->id,
                        ]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Si</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#codigo_producto').select2({
            dropdownParent: $('#insertarModal')
        });
    </script>
@endsection
