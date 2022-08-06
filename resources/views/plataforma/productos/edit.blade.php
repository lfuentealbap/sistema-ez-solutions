@extends('layouts.app')

@section('content')
<h1>Editar producto</h1>
<form action="{{route('plataforma.productos.update', ['producto' => $producto->codigo]) }}" method="post">
    @csrf
    @method('put')
    <div class="form-row">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? $producto->nombre }}">
    </div>
    <div class="form-row">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') ?? $producto->descripcion }}">
    </div>
    <div class="form-row">
        <label for="price">Price</label>
        <input type="number" min="10" step="1" class="form-control" name="valor" value="{{ old('valor') ?? $producto->valor }}">
    </div>


    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Editar Producto</button>
    </div>

</form>
@endsection
