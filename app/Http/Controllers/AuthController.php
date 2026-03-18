<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        if (
            $request->email === 'juanpa05vs@gmail.com' &&
            $request->password === '12345678' &&
            $request->rol === 'Administrador'
        ) {
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
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}
