<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        // Aquí puedes agregar la lógica para obtener todos los usuarios
        $users = User::all();

        // Luego, retornas la vista de la lista de usuarios
        return view('users.index', ['users' => $users]);
    }


    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}


    public function update(Request $request, $id)
{
    // Validar los datos enviados por el formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        // Añade más reglas de validación según sea necesario
    ]);

    // Buscar el usuario por su ID
    $user = User::findOrFail($id);

    // Actualizar los campos del usuario con los nuevos valores
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    // Actualiza más campos según sea necesario

    // Guardar los cambios en la base de datos
    $user->save();

    // Redirigir a la página de detalles del usuario o a cualquier otra página
    return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente.');
}

public function destroy($id)
{
    // Buscar el usuario por su ID
    $user = User::findOrFail($id);

    // Eliminar el usuario
    $user->delete();

    // Redirigir de regreso a la página de listado de usuarios
    return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
}

public function show($id)
{
    $user = User::findOrFail($id);
    return view('users.show', compact('user'));
}


}
