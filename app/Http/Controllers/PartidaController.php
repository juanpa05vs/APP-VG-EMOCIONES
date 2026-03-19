<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index()
    {
        $usuarios = collect([
            (object) ['id' => 1, 'name' => 'Juan Pablo'],
            (object) ['id' => 2, 'name' => 'Charbel Pérez'],
            (object) ['id' => 3, 'name' => 'Karol Garfias'],
            (object) ['id' => 4, 'name' => 'David Luna'],
        ]);

        $partidas = collect([
            (object) [
                'id' => 101,
                'fecha' => '2026-03-18',
                'tiempo_respuesta' => 2.80,
                'estado' => 'Procesada',
                'observaciones' => 'Registro correcto',
                'user' => (object) ['name' => 'Juan Pablo'],
            ],
            (object) [
                'id' => 102,
                'fecha' => '2026-03-17',
                'tiempo_respuesta' => 3.10,
                'estado' => 'Pendiente',
                'observaciones' => 'Requiere validación',
                'user' => (object) ['name' => 'Charbel Pérez'],
            ],
            (object) [
                'id' => 103,
                'fecha' => '2026-03-16',
                'tiempo_respuesta' => 2.35,
                'estado' => 'Procesada',
                'observaciones' => 'Tiempo estable',
                'user' => (object) ['name' => 'Karol Garfias'],
            ],
            (object) [
                'id' => 104,
                'fecha' => '2026-03-15',
                'tiempo_respuesta' => 4.20,
                'estado' => 'Pendiente',
                'observaciones' => 'Observación manual',
                'user' => (object) ['name' => 'David Luna'],
            ],
        ]);

        $metricas = [
            'total' => $partidas->count(),
            'procesadas' => $partidas->where('estado', 'Procesada')->count(),
            'pendientes' => $partidas->where('estado', 'Pendiente')->count(),
            'promedio' => number_format($partidas->avg('tiempo_respuesta'), 2),
        ];

        return view('partidas.index', compact('usuarios', 'partidas', 'metricas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'fecha' => 'required|date',
            'tiempo_respuesta' => 'required|numeric',
            'observaciones' => 'nullable|string|max:255',
        ]);

        return redirect()->route('partidas.index')
            ->with('success', 'Partida registrada correctamente.');
    }
}
