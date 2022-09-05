@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h2>{{ $cliente->nombre_completo }}</h2>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="rut" class="col-md-4 col-form-label text-md-end">RUT:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="rut"
                                    value="{{ __($cliente->rut) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="direccion"
                                    value="{{ $cliente->direccion }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-end">Ciudad:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="ciudad"
                                    value="{{ $cliente->ciudad }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>
                            <div class="col-sm-6">
                                <input type="email" readonly class="form-control" id="email"
                                    value="{{ $cliente->email }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">Telefono:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="telefono"
                                    value="{{ $cliente->telefono }}">
                            </div>
                        </div>
                        <div class="container">
                            <a class="btn btn-secondary" href="{{ route('plataforma.clientes.index') }}"><i
                                    class="fas fa-arrow-left"></i> Volver a la lista</a>
                            <a class="btn btn-primary"
                                href="{{ route('plataforma.clientes.edit', [
                                    'cliente' => $cliente->rut,
                                ]) }}"><i
                                    class="fas fa-edit"></i> Modificar este cliente</a>
                            <form class="d-inline"
                                action="{{ route('plataforma.clientes.destroy', [
                                    'cliente' => $cliente->rut,
                                ]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este
                                    cliente</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
