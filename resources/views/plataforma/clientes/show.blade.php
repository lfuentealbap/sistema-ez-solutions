@extends('layouts.app')

@section('content')

        <div class="card shadow-sm container">
            <div class="card-header text-center">
                <h2>{{$cliente->nombre_completo}}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="rut" class="col-sm-2 col-form-label">RUT:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control" id="rut" value="{{__($cliente->rut)}}">
                    </div>
                  </div>

                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control" id="direccion" value="{{$cliente->direccion}}">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="ciudad" class="col-sm-2 col-form-label">Ciudad:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control" id="ciudad" value="{{$cliente->ciudad}}">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-6">
                      <input type="email" readonly class="form-control" id="email" value="{{$cliente->email}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control" id="telefono" value="{{$cliente->telefono}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <a class="btn btn-secondary" href="{{ route('plataforma.clientes.index') }}"><i class="fas fa-th-list"></i> Volver a la lista</a>
                            <a class="btn btn-primary" href="{{ route('plataforma.clientes.edit', [
                                'cliente' => $cliente->rut]) }}"><i class="fas fa-edit"></i> Modificar este cliente</a>
                            <form class="d-inline" action="{{route('plataforma.clientes.destroy', [
                                'cliente' => $cliente->rut])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este cliente</button>
                            </form>
        </div>




@endsection
