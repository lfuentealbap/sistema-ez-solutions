@extends('layouts.app')

@section('content')
<h1>Editar Cliente</h1>
<form action="{{route('plataforma.clientes.update', ['cliente' => $cliente->rut]) }}" method="post">
    @csrf
    @method('put')
    <div class="form-row">
        <label for="nombre_completo">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre_completo" value="{{ old('nombre_completo') ?? $cliente->nombre_completo }}">
    </div>
    <div class="form-row">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="{{ old('direccion') ?? $cliente->direccion }}">
    </div>
    <div class="form-row">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" name="ciudad" value="{{ old('ciudad') ?? $cliente->ciudad }}">
    </div>
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') ?? $cliente->email }}">
    </div>
    <div class="form-row">
        <label for="ciudad">Teléfono de contacto</label>
        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') ?? $cliente->telefono }}">
    </div>

    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Actualizar cliente</button>
    </div>

</form>
@endsection
