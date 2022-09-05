@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear cotización') }}</div>

                    <div class="card-body">
                        <form action="{{ route('cotizaciones.store') }}" method="post">
                            @csrf
                            <div class="form-row row mb-3">
                                <label for="rut_cliente" class="col-md-4 col-form-label text-md-end">Cliente:</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="rut_cliente" name="rut_cliente">
                                        <option selected value="">Seleccione cliente...</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->rut }}">{{ $cliente->nombre_completo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_creacion" class="col-md-4 col-form-label text-md-end">Fecha actual:</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha_creacion"
                                        value="{{ $hoy }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_expiracion" class="col-md-4 col-form-label text-md-end">Fecha expiración de aprobación</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha_expiracion"
                                        value="{{ old('fecha_expiracion') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Continuar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
