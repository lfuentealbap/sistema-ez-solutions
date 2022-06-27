@extends('layouts.app')

@section('content')
<h1>Create a product</h1>
<form action=" {{route('products.store') }}" method="post">
    @csrf
    <div class="form-row">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" required>
    </div>
    <div class="form-row">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}" required>
    </div>
    <div class="form-row">
        <label for="fecha_inicio">Fecha de Inicio</label>
        <input type="date" class="form-control" name="fecha_inicio" value="{{old('fecha_inicio')}}" required>
    </div>
    <div class="form-row">
        <label for="stock">Fecha de Término</label>
        <input type="date"  class="form-control" name="fecha_termino" value="{{old('fecha_termino')}}" required>
    </div>
    <div class="form-row">
        <label for="stock">Monto a pagar por el trabajo</label>
        <input type="number" min="0" step="500" class="form-control" name="pago" value="{{old('pago')}}" required>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
    </div>

</form>
@endsection
