@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">{{ __('Crear Cotización') }}</div>

    <div class="card-body">
        <form action="{{ route('cotizaciones.productos.store') }}" method="post">
            @csrf
            <div class="form-row row mb-3">
                <label for="rut_cliente">Cliente:</label>
                <div class="col-md-6">
                    <select class="form-select" id="rut_cliente" name="rut_cliente">
                        <option selected value="">Seleccione cliente...</option>
                        @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->rut }}">{{$cliente->nombre_completo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row row mb-3">
                <label for="fecha_creacion">Fecha actual:</label>
                <div class="col-md-6">
                    <input type="datetime-local" class="form-control" disabled name="fecha_creacion" value="{{ $hoy }}" required>
                </div>
            </div>
            <div class="form-row row mb-3">
                <label for="fecha_expiracion">Fecha expiración</label>
                <div class="col-md-6">
                    <input type="datetime-local" class="form-control" name="fecha_expiracion" value="{{old('fecha_expiracion')}}" required>
                </div>
            </div>

            <div class="container">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertarModal">
                    Agregar producto
                </button>
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
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>1</td>
                      <td>100</td>
                      <td>100</td>
                    </tr>
            </table>

            <div class=" row mb-3">
                <button type="button" class="btn btn-primary btn-lg">Crear Cotización</button>
            </div>

        </form>
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
        <div class="modal-body">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <label for="codigo">Codigo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control"  name="codigo" value="" required>
                    </div>
                  </div>
                  <div class="col-6">
                        <label for="codigo">Productos:</label>
                    <div class="col-md-12">
                        <select class="form-select" id="codigo" name="codigo[]">
                            <option selected value="">Seleccione productos...</option>
                            @foreach ($productos as $producto)
                            <option value="{{ $producto->codigo }}">{{$producto->nombre}} - ${{$producto->valor}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col">
                    <label for="codigo">Cantidad:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control"  name="cantidad" value="" required>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Insertar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
