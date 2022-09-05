@extends('layouts.app')

@section('content')
    <form action="{{ route('plataforma.gastos.update', ['gasto' => $gasto->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Editar gasto') }}</div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="rut_trabajador" class="col-md-4 col-form-label text-md-end">Persona quien realizó
                                    el
                                    gasto:</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="rut_trabajador" name="rut_trabajador">
                                        <option selected value="{{ $gasto->trabajador->rut }}">{{ $gasto->trabajador->nombres }} {{ $gasto->trabajador->apellidos }}</option>
                                        @foreach ($trabajadores as $trabajador)
                                        @if ($trabajador->rut != $gasto->trabajador->rut)
                                        <option value="{{ $trabajador->rut }}">{{ $trabajador->nombres }}
                                            {{ $trabajador->apellidos }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nombre_gasto" class="col-md-4 col-form-label text-md-end">Nombre del
                                    gasto</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre_gasto"
                                        value="{{ old('nombre_gasto') ?? $gasto->nombre_gasto }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="detalle" class="col-md-4 col-form-label text-md-end">Detalle</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="detalle"
                                        > {{ old('detalle') ?? $gasto->detalle }} </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tipo_gasto" class="col-md-4 col-form-label text-md-end">Tipo de gasto</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="tipo_gasto" name="tipo">

                                        <option selected value="{{$gasto->tipo}}">{{$gasto->tipo}}</option>
                                        <option value="trabajo">Trabajo</option>
                                        <option value="cotizacion">Cotización</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="otros">Otros</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="monto" class="col-md-4 col-form-label text-md-end">Monto</label>
                                <div class="col-md-6">
                                    <input type="number" min="10" step="1" class="form-control" name="monto"
                                        value="{{ old('monto') ?? $gasto->monto }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_gasto" class="col-md-4 col-form-label text-md-end">Fecha del gasto</label>
                                <div class="col-md-6">
                                    <input type="date"  class="form-control" name="fecha_gasto"
                                        value="{{ old('fecha_gasto') ?? \Carbon\Carbon::parse($gasto->fecha_gasto)->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Editar gasto</button>
                                <a class="btn btn-secondary btn-lg" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i>
                                    Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
