@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                <div class="card-header">
                    <h2>{{ $trabajo->titulo }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="codigo" value="({{ $trabajo->id }})">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="estado"
                                value="{{ $trabajo->estado }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ciudad" class="col-sm-2 col-form-label">Ciudad:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="ciudad"
                                value="{{ $trabajo->ciudad }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="direccion"
                                value="{{ $trabajo->direccion }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                        <div class="col-sm-10">
                            <textarea type="text" readonly class="form-control" id="descripcion" value="{{ $trabajo->descripcion }}">{{ $trabajo->descripcion }} </textarea>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="valor" class="col-sm-2 col-form-label">Pago por este servicio:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="valor"
                                value="${{ $trabajo->pago }}">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha inicio:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="fecha_inicio"
                                value="{{ $inicio }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fecha_termino" class="col-sm-2 col-form-label">Fecha termino:</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="fecha_termino"
                                value="{{ $termino }}">
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i>
                            Volver</a>
                            @if ($trabajo->estado == "en curso" || $trabajo->estado == "atrasado")
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFinalizar"><i class="fas fa-check"></i>
                                Finalizar</button>
                            @endif
                        @if (Auth::user()->rol !== 'trabajador')
                            <a class="btn btn-primary"
                                href="{{ route('plataforma.trabajos.edit', [
                                    'trabajo' => $trabajo->id,
                                ]) }}"><i
                                    class="fas fa-edit"></i> Editar este trabajo</a>
                            <form class="d-inline"
                                action="{{ route('plataforma.trabajos.destroy', [
                                    'trabajo' => $trabajo->id,
                                ]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar este
                                    trabajo</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="modalFinalizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Finalizar Trabajo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Está segur@ de finalizar el trabajo <strong>{{$trabajo->titulo}}</strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
          <a class="btn btn-success" href="{{ route('plataforma.ot.create', [
            'trabajo' => $trabajo->id]) }}" >Finalizar</a>
        </div>
      </div>
    </div>
  </div>
@endsection
