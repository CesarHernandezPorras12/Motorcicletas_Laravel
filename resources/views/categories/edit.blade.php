@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}">
        <label for="description">Descripción:</label>
        <textarea id="description" name="description">{{ $category->description }}</textarea>
        <button type="submit">Actualizar</button>
    </form>
@endsection



