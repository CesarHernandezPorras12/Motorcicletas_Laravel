@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}">
        <label for="description">Descripción:</label>
        <textarea id="description" name="description">{{ $product->description }}</textarea>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" value="{{ $product->price }}">
        <label for="category_id">Categoría:</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <!-- Agregar más campos según sea necesario -->
        <button type="submit">Actualizar</button>
    </form>
@endsection
