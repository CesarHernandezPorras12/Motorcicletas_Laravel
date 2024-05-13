@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Categorías de Motocicletas</h1>
        <!-- Botón para crear nueva categoría -->
        @if(Auth::user() && Auth::user()->priority != 0)
            <div class="mb-3">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Crear Nueva Categoría</a>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                @if(Auth::user() && Auth::user()->priority != 0)
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



