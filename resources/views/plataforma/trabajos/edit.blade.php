@extends('layouts.app')

@section('content')
    <form action="{{ route('plataforma.trabajos.update', ['trabajo' => $trabajo->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Editar trabajo') }}</div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="titulo"
                                    value="{{ old('titulo') ?? $trabajo->titulo }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion"
                                    value="{{ old('descripcion') ?? $trabajo->descripcion }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad"
                                    value="{{ old('ciudad') ?? $trabajo->ciudad }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" name="direccion"
                                    value="{{ old('direccion') ?? $trabajo->direccion }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="datetime-local" class="form-control" name="fecha_inicio"
                                    value="{{ old('fecha_inicio') ?? $inicio }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_termino">Fecha de Término</label>
                                <input type="datetime-local" class="form-control" name="fecha_termino"
                                    value="{{ old('fecha_termino') ?? $termino }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="pago">Monto a pagar por el trabajo</label>
                                <input type="number" min="0" step="500" class="form-control" name="pago"
                                    value="{{ old('pago') ?? $trabajo->pago }}" required>
                            </div>
                            <div class="row mb-3">
                                <label for="id_area">Área:</label>
                                <select class="form-select" id="id_area" name="id_area">
                                    <option selected value="">Seleccione area...</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="estado">Estado:</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option selected value="en curso">En curso</option>
                                    <option value="atrasado">Atrasado</option>
                                    <option value="suspendido">Suspendido</option>
                                    <option value="cancelado">Cancelado</option>
                                    <option value="finalizado">Finalizado</option>
                                </select>
                            </div>

                            <div class="row mb-3">
                                <label for="rut_trabajador">Trabajador asignado:</label>
                                <select class="form-select" id="rut_trabajador" name="rut_trabajador">
                                    <option selected value="">Seleccione empleado...</option>
                                    @foreach ($trabajadores as $trabajador)
                                        <option value="{{ $trabajador->rut }}">{{ $trabajador->nombres }}
                                            {{ $trabajador->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row mt-3">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar datos de trabajo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
