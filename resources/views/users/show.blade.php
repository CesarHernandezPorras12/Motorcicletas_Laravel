@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Detalles del Usuario</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Información del Usuario</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $user->name }}</li>
                    <li class="list-group-item"><strong>Correo electrónico:</strong> {{ $user->email }}</li>
                    <!-- Agregar más detalles según sea necesario -->
                </ul>
            </div>
        </div>
    </div>
@endsection


