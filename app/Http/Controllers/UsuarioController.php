<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        $usuarios = User::orderBy('id', 'desc')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return redirect()->route('usuarios.index');
    }

    public function store(Request $request)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'rol' => 'required|string|max:50',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($usuario->id),
            ],
            'rol' => 'required|string|max:50',
            'password' => 'nullable|min:8',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}