@extends('layouts.app')

@section('content')
    <form action="{{ route('plataforma.trabajadores.update', ['trabajador' => $trabajador->rut]) }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Editar empleado') }}</div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="nombres" class="col-md-4 col-form-label text-md-end">Nombres</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombres"
                                        value="{{ old('nombres') ?? $trabajador->nombres }}">
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <label for="apellidos" class="col-md-4 col-form-label text-md-end">Apellidos</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apellidos"
                                        value="{{ old('apellidos') ?? $trabajador->apellidos }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="direccion"
                                        value="{{ old('direccion') ?? $trabajador->direccion }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-end">Ciudad</label>
                                <div class="col-md-6" class="col-md-4 col-form-label text-md-end">
                                    <input type="text" class="form-control" name="ciudad"
                                        value="{{ old('ciudad') ?? $trabajador->ciudad }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') ?? $trabajador->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-end">Teléfono de contacto</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefono"
                                        value="{{ old('telefono') ?? $trabajador->telefono }}">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar datos de
                                    trabajador</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
