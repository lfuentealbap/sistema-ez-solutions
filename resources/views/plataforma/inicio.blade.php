@extends('layouts.app')

@section('content')

<h1 class="display-6">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
@if (Auth::user()->rol == 'jefe')
<div class="container">
    <h4>Mis Trabajos</h4>
    <p>No hay trabajos registrados</p>
</div>
<div class="container">
    <h4>Gestionar cotizaciones</h4>
    <a class="btn btn-primary" href="#"><i class="fas fa-th-list"></i> Ir a cotizaciones</a>
 </div>
<div class="container"><h4>Gestionar productos para cotización</h4>
    <a class="btn btn-secondary" href="{{ route('plataforma.productos.index') }}"><i class="fas fa-th-list"></i> Ir a productos</a>
</div>
<div class="container"><h4>Gestionar Trabajadores</h4>
    <a class="btn btn-secondary" href="/register"> Registrar nuevo usuario</a>
</div>
@endif

@if (Auth::user()->rol == 'trabajador')
<div class="container">
    <h4>Mis Trabajos</h4>
    <p>No hay trabajos registrados</p>
</div>

@endif

@endsection
