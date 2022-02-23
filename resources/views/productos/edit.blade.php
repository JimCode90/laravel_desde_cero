@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <form method="POST" action="{{ route('productos.update', ['producto' => $producto->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title') ?? $producto->title }}" >
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input
                type="text"
                name="description"
                class="form-control"
                value="{{ old('description') ?? $producto->description }}"  >
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input
                type="number"
                min="1.00"
                step="0.01"
                name="price"
                class="form-control"
                value="{{ old('price') ?? $producto->price }}"  >
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input
                type="number"
                name="stock"
                min="0"
                class="form-control"
                value="{{ old('stock') ?? $producto->stock }}"  >
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" >
                <option
                    {{ old('status') == 'available' ? 'selected' : ($producto->status == 'available' ? 'selected' : '') }}
                    value="available"
                >
                    Available
                </option>
                <option
                    {{ old('status') == 'unavailable' ? 'selected' : ($producto->status == 'unavailable' ? 'selected' : '') }}
                    value="unavailable"
                >
                    Unavailable
                </option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg mt-3" type="submit">Editar producto</button>
        </div>
    </form>
@endsection
