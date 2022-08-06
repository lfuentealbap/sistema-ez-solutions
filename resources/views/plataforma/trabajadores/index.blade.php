@extends('layouts.app')

@section('content')
    <h1>Lista de empleados</h1>

    <a class="btn btn-success mb-3" href="{{ route('register') }}"><i class="fas fa-file-plus"></i> Registrar nuevo empleado</a>

    @if ($trabajadores->isEmpty())
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
                    @foreach ($trabajadores as $trabajador)
                        <tr>

                            <td>{{$trabajador->rut }}</td>
                            <td>{{$trabajador->nombres}} {{$trabajador->nombres}}</td>
                            <td>{{$trabajador->direccion}}</td>
                            <td>{{$trabajador->ciudad}}</td>
                            <td>{{$trabajador->email}}</td>
                            <td>{{$trabajador->telefono}}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('plataforma.trabajadores.show', [
                                    'trabajador' => $trabajador->rut]) }}"><i class="fas fa-eye"></i> Ver</a>
                                <a class="btn btn-primary" href="{{ route('plataforma.trabajadores.edit', [
                                    'trabajador' => $trabajador->rut]) }}"><i class="fas fa-edit"></i> Editar</a>
                                <form class="d-inline" action="{{route('plataforma.trabajadores.destroy', [
                                    'trabajador' => $trabajador->rut])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
