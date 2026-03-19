<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Partida;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function index()
    {
        $partidas = Partida::with('user')->latest()->get();
        $analisis = Analisis::with('partida.user')->latest()->get();

        return view('analisis.index', compact('partidas', 'analisis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'emocion_detectada' => 'required|string|max:100',
            'confianza' => 'required|integer|min:0|max:100',
            'recomendacion' => 'nullable|string|max:255',
        ]);

        Analisis::create($data);

        return redirect()->route('analisis.index')->with('success', 'Análisis guardado correctamente.');
    }
}