@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Producto</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Fotografía:</label>
                <input type="text" class="form-control" id="photo" name="photo">
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría:</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Agregar más campos según sea necesario -->
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection


