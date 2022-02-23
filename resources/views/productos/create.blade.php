@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>
    <form method="POST" action="{{ route('productos.store') }}">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input type="number" min="1.00" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" name="stock" min="0" class="form-control" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" >
                <option value="" selected>Seleccione...</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg mt-3" type="submit">Crear producto</button>
        </div>
    </form>
@endsection
