@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <!-- Agregar más campos según sea necesario -->
        <button type="submit">Guardar</button>
    </form>
@endsection

