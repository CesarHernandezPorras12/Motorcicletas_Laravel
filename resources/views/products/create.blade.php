@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Guardar</button>
    </form>
@endsection
