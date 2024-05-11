@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Detalles del Producto</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información del Producto</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $product->name }}</li>
                    <li class="list-group-item"><strong>Descripción:</strong> {{ $product->description }}</li>
                    <li class="list-group-item"><strong>Precio:</strong> {{ $product->price }}</li>
                    <li class="list-group-item"><strong>Categoría:</strong> {{ $product->category ? $product->category->name : 'Sin categoría' }}</li>
                    <!-- Agregar más detalles según sea necesario -->
                </ul>
            </div>
        </div>
    </div>
@endsection

