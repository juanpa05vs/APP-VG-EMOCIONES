<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\User;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name')->get();
        $partidas = Partida::with('user')->latest()->get();

        return view('partidas.index', compact('usuarios', 'partidas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'tiempo_respuesta' => 'required|numeric',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $data['estado'] = 'Procesada';

        Partida::create($data);

        return redirect()->route('partidas.index')->with('success', 'Partida registrada correctamente.');
    }
}