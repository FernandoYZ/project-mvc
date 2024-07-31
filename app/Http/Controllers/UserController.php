<?php

namespace App\Http\Controllers;

use App\Models\User;
use Core\Request;
use Core\Response;
use Core\Controller;

class UserController extends Controller {
    public function index() {
        $users = User::all();
        $data = [
            'title' => 'Usuarios',
            'tag' => 'Lista de usuarios',
            'description' => 'Lista de todos los usuarios',
            'users' => $users,
            'js' => ['/pages/UserPage.js'],
            'css' => ['/pages/user.css']
        ];

        return $this->views->getView('users', 'index', $data);;
    }

    public function create() {
        return view('users.create');
    }

    // public function store(Validation $request) {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => password_hash($validatedData['password'], PASSWORD_BCRYPT),
    //     ]);

    //     return redirect('/users')->with('success', 'Usuario creado exitosamente');
    // }

    // public function edit($id) {
    //     $user = User::find($id);
    //     return view('users.edit', ['user' => $user]);
    // }

    // public function update(Validation $request, $id) {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //     ]);

    //     $data = [
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email']
    //     ];

    //     if (!empty($validatedData['password'])) {
    //         $data['password'] = password_hash($validatedData['password'], PASSWORD_BCRYPT);
    //     }

    //     User::update($id, $data);

    //     return redirect('/users')->with('success', 'Usuario actualizado exitosamente');
    // }

    // public function destroy($id) {
    //     User::delete($id);
    //     return redirect('/users')->with('success', 'Usuario eliminado exitosamente');
    // }
}
