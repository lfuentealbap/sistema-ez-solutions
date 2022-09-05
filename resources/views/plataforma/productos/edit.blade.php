@extends('layouts.app')

@section('content')
    <form action="{{ route('plataforma.productos.update', ['producto' => $producto->codigo]) }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Editar producto') }}</div>
                        <div class="card-body">
                            <div class="row mb-3">

                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre') ?? $producto->nombre }}">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <label for="description" class="col-md-4 col-form-label text-md-end">Descripcion</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="descripcion"
                                        value="{{ old('descripcion') ?? $producto->descripcion }}">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <label for="price" class="col-md-4 col-form-label text-md-end">Precio</label>
                                <div class="col-md-6">
                                    <input type="number" min="10" step="1" class="form-control" name="valor"
                                        value="{{ old('valor') ?? $producto->valor }}">
                                </div>
                            </div>


                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Editar Producto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
