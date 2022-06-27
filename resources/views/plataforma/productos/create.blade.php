@extends('layouts.app')

@section('content')
<h1>Agregar producto</h1>
<form action=" {{route('productos.store') }}" method="post">
    @csrf
    <div class="form-row">
        <label for="title">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" required>
    </div>
    <div class="form-row">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" required>
    </div>
    <div class="form-row">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" name="valor" value="{{old('valor')}}" required>
    </div>
    <div class="form-row">
        <label for="stock">Stock</label>
        <input type="number" min="1" class="form-control" name="stock" value="{{old('stock')}}" required>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Agregar Producto</button>
    </div>

</form>
@endsection
