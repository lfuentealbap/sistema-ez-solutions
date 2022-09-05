@extends('layouts.app')

@section('content')
    <form action=" {{ route('productos.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Agregar producto') }}</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Nombre</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                    required>
                            </div> </div>
                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripcion</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" name="descripcion"
                                    value="{{ old('descripcion') }}" required>
                            </div></div>
                            <div class="row mb-3">
                                <label for="valor" class="col-md-4 col-form-label text-md-end">Valor</label>
                                <div class="col-md-6">
                                <input type="number" class="form-control" name="valor" value="{{ old('valor') }}"
                                    required>
                            </div></div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Agregar Producto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
