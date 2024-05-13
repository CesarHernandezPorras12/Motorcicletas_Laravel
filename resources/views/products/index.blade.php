@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <h1>Listado de Productos</h1>
        <!-- Botón para agregar un nuevo producto -->
        @if(Auth::user() && Auth::user()->priority != 0)
            <div class="mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-dark text-white">Agregar Producto</a>
            </div>
        @endif
        <!-- Tarjetas de productos existentes -->
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($products as $product)
                <div class="col mb-3">
                    <div class="card">
                        <img src="{{ asset('Fotos/' . basename($product->photo)) }}" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Precio: ${{ number_format($product->price, 2, ',', '.') }}</p>
                            <div class="row">
                                @if(Auth::user() && Auth::user()->priority != 0)
                                    <div class="col-auto">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark text-primary">Editar</a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark text-danger">Eliminar</button>
                                        </form>
                                    </div>
                                @endif
                                <div class="col-auto">
                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-dark text-white">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
