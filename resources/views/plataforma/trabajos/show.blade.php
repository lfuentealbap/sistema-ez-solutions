@extends('layouts.app')

@section('content')

        <div class="card shadow-sm">
            <div class="card-header">
                <h2>{{$trabajo->titulo}}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="codigo" value="({{$trabajo->id}})">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="estado" value="{{$trabajo->estado}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                    <div class="col-sm-10">
                      <textarea type="text" readonly class="form-control" id="descripcion" value="{{$trabajo->descripcion}}">{{$trabajo->descripcion}} </textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="valor" class="col-sm-2 col-form-label">Pago por este servicio:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="valor" value="${{$trabajo->pago}}">
                    </div>
                  </div>


                <div class="mb-3 row">
                    <label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha inicio:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="fecha_inicio" value="{{ $inicio}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha_termino" class="col-sm-2 col-form-label">Fecha termino:</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="fecha_termino" value="{{$termino}}">
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-secondary" href="{{ route('plataforma.productos.index') }}"><i class="fas fa-th-list"></i> Volver a la lista</a>
                            <a class="btn btn-primary" href="{{ route('plataforma.trabajos.edit', [
                                'trabajo' => $trabajo->id]) }}"><i class="fas fa-edit"></i> Editar este trabajo</a>
                            <form class="d-inline" action="{{route('plataforma.trabajos.destroy', [
                                'trabajo' => $trabajo->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este trabajo</button>
                            </form>




@endsection
