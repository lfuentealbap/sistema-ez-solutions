@extends('layouts.app')

@section('content')
<h1>Editar trabajo</h1>
<form action="{{route('plataforma.trabajos.update', ['trabajo' => $trabajo->id]) }}" method="post">
    @csrf
    @method('put')
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
    <div class="form-row">
        <select class="form-select" id="rut" name="rut">
            <option selected value="">Seleccione empleado...</option>
            @foreach ($trabajadores as $trabajo)
            <option value="{{ $producto->rut }}">{{$trabajador->nombres}} {{$trabajador->apellidos}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Actualizar datos de trabajo</button>
    </div>

</form>
@endsection
