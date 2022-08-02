@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h2>{{ $gasto->nombre_gasto }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="rut_trabajador" class="col-md-4 col-form-label text-md-end">Persona quien realizó
                            el
                            gasto:</label>
                        <div class="col-md-6">
                            <select class="form-select" id="rut_trabajador" name="rut_trabajador" disabled>
                                <option selected value="">{{ $gasto->trabajador->nombres }}
                                    {{ $gasto->trabajador->apellidos }}</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nombre_gasto" class="col-md-4 col-form-label text-md-end">Nombre del
                            gasto</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nombre_gasto"
                                value="{{ $gasto->nombre_gasto }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="detalle" class="col-md-4 col-form-label text-md-end">Descripcion</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="detalle" value="{{ $gasto->detalle }}" disabled>{{ $gasto->detalle }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tipo_gasto" class="col-md-4 col-form-label text-md-end">Tipo de gasto</label>
                        <div class="col-md-6">
                            <select class="form-select" id="tipo_gasto" name="tipo_gasto" disabled>
                                <option selected value="">{{ $gasto->tipo }}</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="monto" class="col-md-4 col-form-label text-md-end">Monto</label>
                        <div class="col-md-6">
                            <input type="text" min="10" step="1" class="form-control" name="monto"
                                value="${{ $gasto->monto }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha_gasto" class="col-md-4 col-form-label text-md-end">Fecha del gasto</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="fecha_gasto" value="{{ $fecha }}"
                                disabled>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Volver</a>
                        <a class="btn btn-primary"
                            href="{{ route('plataforma.gastos.edit', [
                                'gasto' => $gasto->id,
                            ]) }}"><i
                                class="fas fa-edit"></i> Editar este gasto</a>
                        <form class="d-inline"
                            action="{{ route('plataforma.gastos.destroy', [
                                'gasto' => $gasto->id,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este
                                gasto</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
