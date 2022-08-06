@extends('layouts.app')

@section('content')
<h1>Editar Empleado</h1>
<form action="{{route('plataforma.trabajadores.update', ['trabajador' => $trabajador->rut]) }}" method="post">
    @csrf
    @method('put')
    <div class="form-row">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" name="nombres" value="{{ old('nombres') ?? $trabajador->nombres }}">
    </div>
    <div class="form-row">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos') ?? $trabajador->apellidos }}">
    </div>
    <div class="form-row">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="{{ old('direccion') ?? $trabajador->direccion }}">
    </div>
    <div class="form-row">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" name="ciudad" value="{{ old('ciudad') ?? $trabajador->ciudad }}">
    </div>
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') ?? $trabajador->email }}">
    </div>
    <div class="form-row">
        <label for="ciudad">Teléfono de contacto</label>
        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') ?? $trabajador->telefono }}">
    </div>

    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Actualizar datos de trabajador</button>
    </div>

</form>
@endsection
