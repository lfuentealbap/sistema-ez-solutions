@extends('layouts.app')

@section('content')
    <h1>Lista de clientes</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.clientes.create') }}"><i class="fas fa-plus-circle"></i> Agregar cliente</a>

    @if ($clientes->isEmpty())
        <div class="alert alert-warning">
            No hay clientes registrados
        </div>
    @else

        <div class="table-responsive rounded" style="background-color: lightblue;">
            <table class="table table-bordered border-primary">
                <thead class="thead-light">
                    <tr>
                        <th>RUT</th>
                        <th>Nombre Completo</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>E-mail</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>

                            <td>{{ $cliente->rut }}</td>
                            <td>{{$cliente->nombre_completo}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->ciudad}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.clientes.show', [
                                    'cliente' => $cliente->rut]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.clientes.edit', [
                                    'cliente' => $cliente->rut]) }}"><i class="fas fa-edit"></i> Editar</a>
                                <button type="submit" class="btn btn-danger"data-bs-toggle="modal"
                                data-bs-target="#modalEliminar{{ $cliente->rut }}"><i class="fas fa-trash-alt"></i>
                                    Eliminar</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <!-- Modal -->
    @foreach ($clientes as $cliente)
        <div class="modal fade" id="modalEliminar{{ $cliente->rut }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Está segur@ de eliminar el cliente<strong> {{ $cliente->nombre_completo }} </strong>?
                        <div class="container">
                            <hr>
                            <p class="text-start"><strong>Rut: </strong> {{ $cliente->rut }}</p>
                            <p class="text-start"><strong>Email: </strong>{{ $cliente->email }}</p>
                            <p class="text-start"><strong>Teléfono: </strong>{{ $cliente->telefono }}</p>
                            <hr>
                        </div>
                        <p class="text-center">Esta acción no se puede <strong>deshacer</strong>!!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <form class="d-inline"
                            action="{{ route('plataforma.clientes.destroy', [
                                'cliente' => $cliente->rut,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar cliente</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    @endforeach

@endsection
