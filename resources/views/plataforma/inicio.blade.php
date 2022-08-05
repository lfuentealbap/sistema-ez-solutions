@extends('layouts.app')

@section('content')

    <h1 class="display-6 text-center">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
    @if (Auth::user()->rol == 'jefe')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Mis Trabajos</h4>
                </div>
                <div class="card-body">
                    @php
                        $contadorT = 0;
                    @endphp
                    @foreach ($trabajos as $trabajo)
                        @if ($trabajo->rut_trabajador == Auth::user()->rut)
                            <div class="row">
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $trabajo->titulo }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                @if ($trabajo->estado == 'en curso')
                                                    <span class="badge bg-primary">En curso</span>
                                                @elseif ($trabajo->estado == 'finalizado')
                                                    <span class="badge bg-success">Finalizado</span>
                                                @elseif ($trabajo->estado == 'suspendido')
                                                    <span class="badge bg-danger">Suspendido</span>
                                                @elseif ($trabajo->estado == 'cancelado')
                                                    <span class="badge bg-secondary">Cancelado</span>
                                                @elseif ($trabajo->estado == 'atrasado')
                                                    <span class="badge bg-warning">Atrasado</span>
                                                @endif
                                            </h6>
                                            <p class="card-text">{{ $trabajo->descripcion }}.</p>
                                            <a href="{{ route('plataforma.trabajos.show', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"
                                                class="btn btn-primary ">Ver detalles</a>
                                            @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                            <a class="btn btn-success" href="{{ url()->previous() }}"><i class="fas fa-check"></i>
                                                Finalizar</a>
                                            @endif

                                        </div>
                                    </div>
                                    @php
                                        $contadorT = $contadorT + 1;
                                    @endphp
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if ($contadorT == 0)
                        <div class="alert alert-warning">
                            <p>No hay trabajos registrados</p>
                        </div>
                    @endif
                </div>

            </div>



        </div>
    @endif

    @if (Auth::user()->rol == 'trabajador')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Mis Trabajos</h4>
                </div>
                <div class="card-body">
                    @php
                        $contadorT = 0;
                    @endphp
                    @foreach ($trabajos as $trabajo)
                        @if ($trabajo->rut_trabajador == Auth::user()->rut)
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $trabajo->titulo }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                @if ($trabajo->estado == 'en curso')
                                                    <span class="badge bg-primary">En curso</span>
                                                @elseif ($trabajo->estado == 'finalizado')
                                                    <span class="badge bg-success">Finalizado</span>
                                                @elseif ($trabajo->estado == 'suspendido')
                                                    <span class="badge bg-danger">Suspendido</span>
                                                @elseif ($trabajo->estado == 'cancelado')
                                                    <span class="badge bg-secondary">Cancelado</span>
                                                @elseif ($trabajo->estado == 'atrasado')
                                                    <span class="badge bg-warning">Atrasado</span>
                                                @endif
                                            </h6>
                                            <p class="card-text">{{ $trabajo->descripcion }}.</p>
                                            <a href="{{ route('plataforma.trabajos.show', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"
                                                class="card-link">Ver detalles</a>
                                            @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                                <a href="#" class="card-link">Finalizar</a>
                                            @endif
                                        </div>
                                    @php
                                        $contadorT = $contadorT + 1;
                                    @endphp
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if ($contadorT == 0)
                        <div class="alert alert-warning">
                            <p>No hay trabajos registrados</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

@endsection
