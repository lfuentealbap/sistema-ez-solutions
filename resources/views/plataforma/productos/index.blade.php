@extends('layouts.app')

@section('content')
    <h1>Lista de productos para cotización</h1>

    <a class="btn btn-success mb-3" href="{{ route('plataforma.productos.create') }}"><i class="fas fa-file-plus"></i> Crear</a>

    @empty($productos)
        <div class="alert alert-warning">
            No hay productos registrados
        </div>
    @else

    <div class="table-responsive rounded" style="background-color: lightblue;">
        <table class="table table-bordered border-primary">
            <thead class="thead-light">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->codigo}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->valor}}</td>
                        <td>{{$producto->stock}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('plataforma.productos.show', [
                                'producto' => $producto->codigo]) }}"><i class="fas fa-eye"></i> Ver</a>
                            <a class="btn btn-primary" href="{{ route('plataforma.productos.edit', [
                                'producto' => $producto->codigo]) }}"><i class="fas fa-edit"></i> Editar</a>
                            <form class="d-inline" action="{{route('plataforma.productos.destroy', [
                                'producto' => $producto->codigo])}}" method="post">
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
    @endempty

@endsection
