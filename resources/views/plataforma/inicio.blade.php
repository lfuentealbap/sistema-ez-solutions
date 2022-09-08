@extends('layouts.app')

@section('content')

    <h1 class="display-6 text-center">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
    @if (Auth::user()->rol == 'secretaria')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Trabajos de los empleados</h4>
                </div>
                <div class="card-body">
                    @php
                        $contadorT = 0;
                    @endphp
                    <div class="row">
                        @foreach ($trabajos as $trabajo)

                                <div class="col">
                                    <div class="card" style="margin-top:5px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $trabajo->titulo }}</h5>
                                            <h6 class="card-text">
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
                                            <p class="card-text"><strong>Ubicación:</strong>
                                                {{ $trabajo->direccion }}, {{ $trabajo->ciudad }}</p>
                                            <a href="{{ route('plataforma.trabajos.show', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"
                                                class="btn btn-primary ">Ver detalles</a>
                                            @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')

                                            @endif

                                        </div>
                                    </div>
                                    @php
                                        $contadorT = $contadorT + 1;
                                    @endphp
                                </div>

                        @endforeach
                    </div>
                    @if ($contadorT == 0)
                        <div class="alert alert-warning">
                            <p>No hay trabajos registrados</p>
                        </div>
                    @endif
                </div>
            </div>
    @endif
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
                    <div class="row">
                        @foreach ($trabajos as $trabajo)
                            @if ($trabajo->rut_trabajador == Auth::user()->rut)
                                <div class="col">
                                    <div class="card" style="margin-top:5px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $trabajo->titulo }}</h5>
                                            <h6 class="card-text">
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
                                            <p class="card-text"><strong>Ubicación:</strong>
                                                {{ $trabajo->direccion }}, {{ $trabajo->ciudad }}</p>
                                            <a href="{{ route('plataforma.trabajos.show', [
                                                'trabajo' => $trabajo->id,
                                            ]) }}"
                                                class="btn btn-primary ">Ver detalles</a>
                                            @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                                <button type="button" class="btn btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalFinalizar{{ $trabajo->id }}"><i
                                                        class="fas fa-check"></i>
                                                    Finalizar</button>
                                            @endif

                                        </div>
                                    </div>
                                    @php
                                        $contadorT = $contadorT + 1;
                                    @endphp
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if ($contadorT == 0)
                        <div class="alert alert-warning">
                            <p>No hay trabajos registrados</p>
                        </div>
                    @endif
                </div>
            </div>
    @endif

    @if (Auth::user()->rol == 'trabajador')
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-trabajos-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-trabajos" type="button" role="tab" aria-controls="nav-trabajos"
                        aria-selected="true">Trabajos</button>
                    <button class="nav-link" id="nav-sueldo-tab" data-bs-toggle="tab" data-bs-target="#nav-sueldo"
                        type="button" role="tab" aria-controls="nav-sueldo" aria-selected="false">Sueldo</button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-trabajos" role="tabpanel" aria-labelledby="nav-trabajos-tab">

                    <div class="card">
                        <div class="card-header">
                            <h4>Mis Trabajos</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $contadorT = 0;
                            @endphp
                            <div class="row">
                                @foreach ($trabajos as $trabajo)
                                    @if ($trabajo->rut_trabajador == Auth::user()->rut)
                                        <div class="col" >
                                            <div class="card" style="margin-top:5px; width: 190px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $trabajo->titulo }}</h5>
                                                    <h6 class="card-text">
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
                                                    <p class="card-text"><strong>Ubicación:</strong>
                                                        {{ $trabajo->direccion }}, {{ $trabajo->ciudad }}</p>
                                                    <a href="{{ route('plataforma.trabajos.show', [
                                                        'trabajo' => $trabajo->id,
                                                    ]) }}"
                                                        class="btn btn-primary ">Ver detalles</a>
                                                    @if ($trabajo->estado == 'en curso' || $trabajo->estado == 'atrasado')
                                                        <button type="button" class="btn btn-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalFinalizar{{ $trabajo->id }}"><i
                                                                class="fas fa-check"></i>
                                                            Finalizar</button>
                                                    @endif

                                                </div>
                                            </div>
                                            @php
                                                $contadorT = $contadorT + 1;
                                            @endphp
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @if ($contadorT == 0)
                                <div class="alert alert-warning">
                                    <p>No hay trabajos registrados</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-sueldo" role="tabpanel" aria-labelledby="nav-sueldo-tab">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h4>Mi sueldo</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($sueldos as $sueldo)
                                    @if ($sueldo->rut_trabajador == Auth::user()->rut)
                                    Mi sueldo es de <strong>${{$sueldo->sueldo}} </strong>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal -->
    @foreach ($trabajos as $trabajo)
        <div class="modal fade" id="modalFinalizar{{ $trabajo->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Finalizar Trabajo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Está segur@ de finalizar el trabajo <strong>{{ $trabajo->titulo }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <a class="btn btn-success"
                            href="{{ route('plataforma.ot.create', [
                                'trabajo' => $trabajo->id,
                            ]) }}">Finalizar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
