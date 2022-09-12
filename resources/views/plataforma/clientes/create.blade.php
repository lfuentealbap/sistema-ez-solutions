@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar cliente') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="rut"
                                    class="col-md-4 col-form-label text-md-end">{{ __('RUT o RUN') }}</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" oninput="checkRut(this)"
                                        class="form-control  @error('rut') is-invalid @enderror" name="rut"
                                        value="{{ old('rut') }}" required autocomplete="rut">

                                    @error('rut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nombre_completo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre_completo" type="text"
                                        class="form-control @error('nombre_completo') is-invalid @enderror"
                                        name="nombre_completo" value="{{ old('nombre_completo') }}" required
                                        autocomplete="nombres" autofocus>

                                    @error('nombre_completo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="direccion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ciudad"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="ciudad" name="ciudad" required>
                                        <option selected value="">Seleccione ciudad...</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->ciudad }}">{{ $ciudad->ciudad }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text"
                                        class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                        value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar cliente') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#ciudad').select2();
    </script>
@endsection
