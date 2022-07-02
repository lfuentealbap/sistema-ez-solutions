@extends('layouts.app')

@section('content')

<h1 class="display-6 text-center">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
@if (Auth::user()->rol == 'jefe')
<div class="container">
    <h4>Mis Trabajos</h4>
        @php
            $contadorT = 0;
        @endphp
        @foreach ($trabajos as $trabajo)
            @if ($trabajo->rut_trabajador == Auth::user()->rut)

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{$trabajo->titulo}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$trabajo->estado}}</h6>
                <p class="card-text">{{$trabajo->descripcion}}.</p>
                <a href=href="{{ route('plataforma.trabajos.show', [
                    'trabajo' => $trabajo->id]) }} class="card-link">Ver detalles</a>
                <a href="#" class="card-link">Finalizar</a>
                </div>
            </div>
            @php
                $contadorT = $contadorT + 1;
            @endphp
            @endif
        @endforeach

        @if ($contadorT==0)
            <div class="alert alert-warning">
                <p>No hay trabajos registrados</p>
            </div>
        @endif

</div>

@endif

@if (Auth::user()->rol == 'trabajador')
<div class="container">
    <h4>Mis Trabajos</h4>
    @if ($trabajos->trabajador()->isEmpty())
    <div class="alert alert-warning">
        <p>No hay trabajos registrados</p>
    </div>
    @else
    @foreach ($trabajos as $trabajo)


        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$trabajo->titulo}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$trabajo->estado}}</h6>
              <p class="card-text">{{$trabajo->descripcion}}.</p>
              <a href=href="{{ route('plataforma.trabajos.show', [
                'trabajo' => $trabajo->id]) }} class="card-link">Ver detalles</a>
              <a href="#" class="card-link">Finalizar</a>
            </div>
          </div>



    @endforeach
    @endif
</div>

@endif

@endsection
