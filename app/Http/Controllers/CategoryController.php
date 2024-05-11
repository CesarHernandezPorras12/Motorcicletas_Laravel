<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Asegúrate de importar el modelo Category si aún no lo has hecho

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                // Obtener todas las categorías de la base de datos
                $categories = Category::all();

                // Retornar la vista 'categories.index' pasando las categorías como datos
                return view('categories.index', ['categories' => $categories]);
    }

    public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    // Valida los datos enviados por el formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    // Crea una nueva instancia de categoría con los datos proporcionados
    $category = new Category([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
    ]);

    // Guarda la categoría en la base de datos
    $category->save();

    // Redirecciona de regreso a la página de listado de categorías
    return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
}


public function show($id)
{
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
}

public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    // Valida los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
    ]);

    // Encuentra la categoría que se va a actualizar
    $category = Category::findOrFail($id);

    // Actualiza los atributos de la categoría con los datos del formulario
    $category->name = $request->name;
    $category->description = $request->description;
    // Agrega más campos según sea necesario

    // Guarda los cambios en la base de datos
    $category->save();

    // Redirecciona de regreso a la página de listado de categorías
    return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
}


public function destroy($id)
{
    // Encuentra la categoría que se va a eliminar
    $category = Category::findOrFail($id);

    // Elimina la categoría de la base de datos
    $category->delete();

    // Redirecciona de regreso a la página de listado de categorías
    return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
}

}