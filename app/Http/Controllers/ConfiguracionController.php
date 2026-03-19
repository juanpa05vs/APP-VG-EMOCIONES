<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $configuracion = (object) [
            'nombre_sistema' => 'EmotionPlay',
            'version' => '1.0',
            'modo' => 'Pruebas',
            'estado' => 'Activo',
            'responsable' => 'Administrador del sistema',
            'actualizacion' => '2026-03-18',
        ];

        $metricas = [
            'parametros' => 6,
            'estado' => 'Activo',
            'modo' => 'Pruebas',
            'version' => '1.0',
        ];

        return view('configuracion.index', compact('configuracion', 'metricas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_sistema' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'modo' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'responsable' => 'required|string|max:255',
        ]);

        return redirect()->route('configuracion.index')
            ->with('success', 'Configuración guardada correctamente.');
    }
}
