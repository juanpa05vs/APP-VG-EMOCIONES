<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Analisis;
use App\Models\Reporte;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = collect();

        foreach (Partida::with('user')->latest()->take(10)->get() as $item) {
            $historial->push([
                'fecha' => $item->created_at,
                'usuario' => $item->user->name ?? 'Sin usuario',
                'modulo' => 'Partidas',
                'resultado' => $item->estado,
                'observacion' => $item->observaciones ?? 'Sin observación',
            ]);
        }

        foreach (Analisis::with('partida.user')->latest()->take(10)->get() as $item) {
            $historial->push([
                'fecha' => $item->created_at,
                'usuario' => $item->partida->user->name ?? 'Sin usuario',
                'modulo' => 'Análisis',
                'resultado' => $item->emocion_detectada,
                'observacion' => $item->recomendacion ?? 'Sin observación',
            ]);
        }

        foreach (Reporte::with('user')->latest()->take(10)->get() as $item) {
            $historial->push([
                'fecha' => $item->created_at,
                'usuario' => $item->user->name ?? 'Sin usuario',
                'modulo' => 'Reportes',
                'resultado' => $item->estado,
                'observacion' => $item->tipo . ' - ' . $item->periodo,
            ]);
        }

        $historial = $historial->sortByDesc('fecha')->take(20);

        return view('historial.index', compact('historial'));
    }
}