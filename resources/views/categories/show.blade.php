@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        <h1 class="mt-4 mb-4">Detalles de la Categoría</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información de la Categoría</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $category->name }}</li>
                    <li class="list-group-item"><strong>Descripción:</strong> {{ $category->description }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
