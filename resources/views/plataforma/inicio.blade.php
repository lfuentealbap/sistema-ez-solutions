@extends('layouts.app')

@section('content')

<h1 class="display-6 text-center">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
@if (Auth::user()->rol == 'jefe')
<div class="container">
    <h4>Mis Trabajos</h4>
    <p>No hay trabajos registrados</p>
</div>

@endif

@if (Auth::user()->rol == 'trabajador')
<div class="container">
    <h4>Mis Trabajos</h4>
    <p>No hay trabajos registrados</p>
</div>

@endif

@endsection
