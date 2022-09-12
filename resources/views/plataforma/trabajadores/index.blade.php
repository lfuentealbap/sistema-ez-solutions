@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Todos los empleados</h4>
        </div>
        <div class="card-body">

            @if ($trabajadores->isEmpty())
                <div class="alert alert-warning">
                    No hay clientes registrados
                </div>
            @else
                <div class="table-responsive rounded" >
                    <table class="table table-bordered border-primary" id="misEmpleados" style="background-color: lightblue;">
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
                            @foreach ($trabajadores as $trabajador)
                                <tr>

                                    <td>{{ $trabajador->rut }}</td>
                                    <td>{{ $trabajador->nombres }} {{ $trabajador->apellidos }}</td>
                                    <td>{{ $trabajador->direccion }}</td>
                                    <td>{{ $trabajador->ciudad }}</td>
                                    <td>{{ $trabajador->email }}</td>
                                    <td>{{ $trabajador->telefono }}</td>
                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('plataforma.trabajadores.show', [
                                                'trabajador' => $trabajador->rut,
                                            ]) }}"><i
                                                class="fas fa-eye"></i> Ver</a>
                                        <a class="btn btn-primary"
                                            href="{{ route('plataforma.trabajadores.edit', [
                                                'trabajador' => $trabajador->rut,
                                            ]) }}"><i
                                                class="fas fa-edit"></i> Editar</a>

                                            <button type="submit" class="btn btn-danger"data-bs-toggle="modal"
                                            data-bs-target="#modalEliminar{{ $trabajador->rut }}"><i class="fas fa-trash-alt"></i>
                                                Eliminar</button>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal -->
    @foreach ($trabajadores as $trabajador)
        <div class="modal fade" id="modalEliminar{{ $trabajador->rut }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar trabajador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Está segur@ de eliminar el/la trabajador/a<strong> {{ $trabajador->nombres }} {{ $trabajador->apellidos }}</strong>?
                        <div class="container">
                            <hr>
                            <p class="text-start"><strong>Rut: </strong> {{ $trabajador->rut }}</p>
                            <p class="text-start"><strong>Email: </strong>{{ $trabajador->email }}</p>
                            <p class="text-start"><strong>Teléfono: </strong>{{ $trabajador->telefono }}</p>
                            <hr>
                        </div>
                        <p class="text-center">Esta acción no se puede <strong>deshacer</strong>!!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                        <form class="d-inline"
                            action="{{ route('plataforma.trabajadores.destroy', [
                                'trabajador' => $trabajador->rut,
                            ]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar trabajador</button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    @endforeach
@endsection
