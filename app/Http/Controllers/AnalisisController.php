<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function index()
    {
        $partidas = collect([
            (object) [
                'id' => 101,
                'fecha' => '2026-03-18',
                'estado' => 'Procesada',
                'tiempo_respuesta' => 2.80,
                'user' => (object) ['name' => 'Juan Pablo'],
            ],
            (object) [
                'id' => 102,
                'fecha' => '2026-03-17',
                'estado' => 'Pendiente',
                'tiempo_respuesta' => 3.10,
                'user' => (object) ['name' => 'Charbel Pérez'],
            ],
            (object) [
                'id' => 103,
                'fecha' => '2026-03-16',
                'estado' => 'Procesada',
                'tiempo_respuesta' => 2.35,
                'user' => (object) ['name' => 'Karol Garfias'],
            ],
        ]);

        $analisis = collect([
            (object) [
                'id' => 1,
                'emocion_detectada' => 'Alegría',
                'confianza' => 87,
                'recomendacion' => 'Continuar seguimiento',
                'estado' => 'Validado',
                'partida' => (object) [
                    'id' => 101,
                    'user' => (object) ['name' => 'Juan Pablo'],
                ],
            ],
            (object) [
                'id' => 2,
                'emocion_detectada' => 'Calma',
                'confianza' => 79,
                'recomendacion' => 'Mantener actividad',
                'estado' => 'Validado',
                'partida' => (object) [
                    'id' => 102,
                    'user' => (object) ['name' => 'Charbel Pérez'],
                ],
            ],
            (object) [
                'id' => 3,
                'emocion_detectada' => 'Estrés',
                'confianza' => 65,
                'recomendacion' => 'Revisión adicional',
                'estado' => 'Pendiente',
                'partida' => (object) [
                    'id' => 103,
                    'user' => (object) ['name' => 'Karol Garfias'],
                ],
            ],
        ]);

        $metricas = [
            'total' => $analisis->count(),
            'validado' => $analisis->where('estado', 'Validado')->count(),
            'pendiente' => $analisis->where('estado', 'Pendiente')->count(),
            'promedio_confianza' => number_format($analisis->avg('confianza'), 0),
        ];

        return view('analisis.index', compact('partidas', 'analisis', 'metricas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_id' => 'required',
            'emocion_detectada' => 'required|string|max:100',
            'confianza' => 'required|integer|min:0|max:100',
            'recomendacion' => 'nullable|string|max:255',
        ]);

        return redirect()->route('analisis.index')
            ->with('success', 'Análisis guardado correctamente.');
    }
}
