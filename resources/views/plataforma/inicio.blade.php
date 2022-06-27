@extends('layouts.app')

@section('content')

<h1 class="display-6">Bienvenid@ a la Plataforma de EZ Solutions!</h1>
@if (Auth::user()->rol == 'jefe')
<div><h4>Gesionar cotizaciones</h4>
    <a class="btn btn-primary" href="#"><i class="fas fa-th-list"></i>Ir a cotizaciones</a>
 </div>
    <div><h4>Gesionar productos para cotización</h4>
        <a class="btn btn-secondary" href="{{ route('plataforma.productos.index') }}"><i class="fas fa-th-list"></i>Ir a productos</a>
     </div>
@endif
<div class="container">

</div>

@endsection
