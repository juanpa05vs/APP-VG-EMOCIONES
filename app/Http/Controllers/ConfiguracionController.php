<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $configuracion = Configuracion::first();

        if (!$configuracion) {
            $configuracion = Configuracion::create([
                'nombre_sistema' => 'EmotionPlay',
                'version' => '1.0',
                'modo' => 'Pruebas',
                'estado' => 'Activo',
            ]);
        }

        return view('configuracion.index', compact('configuracion'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_sistema' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'modo' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
        ]);

        $configuracion = Configuracion::first();

        if ($configuracion) {
            $configuracion->update($data);
        } else {
            Configuracion::create($data);
        }

        return redirect()->route('configuracion.index')->with('success', 'Configuración guardada correctamente.');
    }
}