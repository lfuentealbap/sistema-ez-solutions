@extends('layouts.app')

@section('content')
    <h1>Lista de clientes</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.clientes.create') }}"><i class="fas fa-file-plus"></i> Crear</a>

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
                                <form class="d-inline" action="{{route('plataforma.clientes.destroy', [
                                    'cliente' => $cliente->rut])}}" method="post">
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
