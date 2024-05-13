@extends('layouts.app')

@section('content')
    <div class="container bg-light">
             <!-- Botón para regresar a la lista de productos -->
        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la Lista de Productos</a>
        </div>

        <h1 class="mt-4 mb-4">Detalles del Producto</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información del Producto</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $product->name }}</li>
                    <li class="list-group-item"><img src="{{ asset('Fotos/' . basename($product->photo)) }}" class="img-thumbnail" alt="Imagen del producto"></li>
                    <li class="list-group-item"><strong>Descripción:</strong> {{ $product->description }}</li>
                    <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($product->price, 2, ',', '.') }}</li>
                    <li class="list-group-item"><strong>Categoría:</strong> {{ $product->category ? $product->category->name : 'Sin categoría' }}</li>
                    <!-- Agregar más detalles según sea necesario -->
                </ul>
            </div>
        </div>
    </div>
@endsection


