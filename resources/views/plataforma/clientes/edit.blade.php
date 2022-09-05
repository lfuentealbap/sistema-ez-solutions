@extends('layouts.app')

@section('content')
    <form action="{{ route('plataforma.clientes.update', ['cliente' => $cliente->rut]) }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Editar cliente') }}</div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="nombre_completo" class="col-md-4 col-form-label text-md-end">Nombre Completo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre_completo"
                                        value="{{ old('nombre_completo') ?? $cliente->nombre_completo }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion"
                                        value="{{ old('direccion') ?? $cliente->direccion }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-end">Ciudad</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ciudad"
                                        value="{{ old('ciudad') ?? $cliente->ciudad }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') ?? $cliente->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-end">Teléfono de contacto</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefono"
                                        value="{{ old('telefono') ?? $cliente->telefono }}">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar cliente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
