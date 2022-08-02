@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Gasto') }}</div>

                    <div class="card-body">
                        <form action="{{ route('gastos.store') }}" method="post">
                            @csrf
                            @if (Auth::user()->rol == 'trabajador')

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="rut_trabajador"
                                            value="{{ Auth::user()->rut }}" required>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-3">
                                    <label for="rut_trabajador" class="col-md-4 col-form-label text-md-end">Persona quien realizará el gasto:</label>
                                    <div class="col-md-6">
                                        <select class="form-select" id="rut_trabajador" name="rut_trabajador">
                                            <option selected value="">Seleccione empleado...</option>
                                            @foreach ($trabajadores as $trabajador)
                                                <option value="{{ $trabajador->rut }}">{{ $trabajador->nombres }}
                                                    {{ $trabajador->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="nombre_gasto" class="col-md-4 col-form-label text-md-end">Nombre del gasto:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre_gasto"
                                        value="{{ old('nombre_gasto') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="detalle" class="col-md-4 col-form-label text-md-end">Detalle</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="detalle" value="{{ old('detalle') }}" rows="4" required> </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tipo" class="col-md-4 col-form-label text-md-end">Tipo de gasto</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="tipo" name="tipo">
                                        <option selected value="trabajo">Trabajo</option>
                                        <option value="cotizacion">Cotización</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="monto" class="col-md-4 col-form-label text-md-end">Monto total del gasto:</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="monto" value="{{ old('monto') }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fecha_gasto" class="col-md-4 col-form-label text-md-end">Fecha del gasto:</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha_gasto"
                                        value="{{ old('fecha_gasto') }}" required>
                                </div>
                            </div>


                            <div class=" col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear gasto</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
