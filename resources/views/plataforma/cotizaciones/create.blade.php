@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header">{{ __('Crear Cotización') }}</div>

    <div class="card-body">
        <form action="{{ route('cotizaciones.store') }}" method="post">
            @csrf
            <div class="form-row row mb-3">
                <label for="rut_cliente">Cliente:</label>
                <div class="col-md-6">
                    <select class="form-select" id="rut_cliente" name="rut_cliente">
                        <option selected value="">Seleccione cliente...</option>
                        @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->rut }}">{{$cliente->nombre_completo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row row mb-3">
                <label for="fecha_creacion">Fecha actual:</label>
                <div class="col-md-6">
                    <input type="date" class="form-control"  name="fecha_creacion" value="{{ $hoy }}" required>
                </div>
            </div>
            <div class="form-row row mb-3">
                <label for="fecha_expiracion">Fecha expiración de aprobación</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="fecha_expiracion" value="{{old('fecha_expiracion')}}" required>
                </div>
            </div>


            <div class=" row mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Continuar</button>
            </div>

        </form>
    </div>
</div>


@endsection
