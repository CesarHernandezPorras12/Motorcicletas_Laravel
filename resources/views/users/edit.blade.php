@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <!-- Agregar más campos según sea necesario -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

