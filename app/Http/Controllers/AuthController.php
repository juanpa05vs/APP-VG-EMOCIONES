<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function home()
    {
        return view('auth.home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'rol' => 'required'
        ]);

        $user = User::where('email', $request->email)
            ->where('rol', $request->rol)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_role' => $user->rol
            ]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => 'Credenciales incorrectas o rol no válido.'
        ])->withInput();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'Usuario'
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}