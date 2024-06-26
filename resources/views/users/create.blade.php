@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Usuario</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Agregar más campos según sea necesario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

