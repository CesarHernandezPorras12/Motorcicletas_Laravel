@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Regresar a Productos</a>
        </div>
        <h1>Editar Producto</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Fotografía:</label>
                <input type="text" class="form-control" id="photo" name="photo" value="{{ $product->photo }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría:</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Agregar más campos según sea necesario -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
