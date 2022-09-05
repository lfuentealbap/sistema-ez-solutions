@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h2>{{ $trabajador->nombres }} {{ $trabajador->apellidos }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="rut" class="col-sm-2 col-form-label">RUT:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="rut"
                                value="{{ __($trabajador->rut) }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="direccion"
                                value="{{ $trabajador->direccion }}">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="ciudad" class="col-sm-2 col-form-label">Ciudad:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="ciudad"
                                value="{{ $trabajador->ciudad }}">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" readonly class="form-control" id="email"
                                value="{{ $trabajador->email }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control" id="telefono"
                                value="{{ $trabajador->telefono }}">
                        </div>
                    </div>
                    <div class="container">
                        <a class="btn btn-secondary" href="{{ route('plataforma.trabajadores.index') }}"><i
                                class="fas fa-arrow-left"></i> Volver a la lista</a>
                        <a class="btn btn-primary"
                            href="{{ route('plataforma.trabajadores.edit', [
                                'trabajador' => $trabajador->rut,
                            ]) }}"><i
                                class="fas fa-edit"></i> Modificar este trabajador</a>
                        <form class="d-inline"
                            action="{{ route('plataforma.trabajadores.destroy', [
                                'trabajador' => $trabajador->rut,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este
                                trabajador</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
