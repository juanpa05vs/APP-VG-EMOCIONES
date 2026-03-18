<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login');
        }

        $usuariosTotal = User::count();
        $adminsTotal = User::where('rol', 'Administrador')->count();
        $investigadoresTotal = User::where('rol', 'Investigador')->count();
        $usuariosNormalesTotal = User::where('rol', 'Usuario')->count();

        $usuariosRecientes = User::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'usuariosTotal',
            'adminsTotal',
            'investigadoresTotal',
            'usuariosNormalesTotal',
            'usuariosRecientes'
        ));
    }
}