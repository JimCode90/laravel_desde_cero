@extends('layouts.app')
@section('content')
    <h1>Lista de Productos</h1>
    <a class="btn btn-success mb-3" href="{{ route('productos.create') }}">Crear Producto</a>
    @empty ($productos)
        <div class="alert alert-warning">
            Lista de productos vacía
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-stripe">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->title }}</td>
                        <td>{{ $producto->description }}</td>
                        <td>{{ $producto->price }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->status }}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('productos.show', ['producto' => $producto->id]) }}">Show</a>
                            <a class="btn btn-link" href="{{ route('productos.edit', ['producto' => $producto->id]) }}">Edit</a>
                            <form class="d-inline" action="{{ route('productos.destroy', ['producto' => $producto->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
