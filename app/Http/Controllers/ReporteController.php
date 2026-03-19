<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $usuarios = collect([
            (object) ['id' => 1, 'name' => 'Juan Pablo'],
            (object) ['id' => 2, 'name' => 'Charbel Pérez'],
            (object) ['id' => 3, 'name' => 'Karol Garfias'],
            (object) ['id' => 4, 'name' => 'David Luna'],
        ]);

        $reportes = collect([
            (object) [
                'id' => 201,
                'tipo' => 'Individual',
                'periodo' => 'Hoy',
                'estado' => 'Generado',
                'fecha_generacion' => '2026-03-18',
                'descripcion' => 'Reporte detallado por usuario',
                'user' => (object) ['name' => 'Juan Pablo'],
            ],
            (object) [
                'id' => 202,
                'tipo' => 'Resumen',
                'periodo' => 'Última semana',
                'estado' => 'Pendiente',
                'fecha_generacion' => '2026-03-17',
                'descripcion' => 'Resumen de actividades registradas',
                'user' => (object) ['name' => 'Charbel Pérez'],
            ],
            (object) [
                'id' => 203,
                'tipo' => 'General',
                'periodo' => 'Último mes',
                'estado' => 'Generado',
                'fecha_generacion' => '2026-03-16',
                'descripcion' => 'Concentrado general de información',
                'user' => (object) ['name' => 'Karol Garfias'],
            ],
        ]);

        $metricas = [
            'total' => $reportes->count(),
            'generados' => $reportes->where('estado', 'Generado')->count(),
            'pendientes' => $reportes->where('estado', 'Pendiente')->count(),
            'usuarios_con_reporte' => $reportes->pluck('user.name')->unique()->count(),
        ];

        return view('reportes.index', compact('usuarios', 'reportes', 'metricas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tipo' => 'required|string|max:100',
            'periodo' => 'required|string|max:100',
        ]);

        return redirect()->route('reportes.index')
            ->with('success', 'Reporte generado correctamente.');
    }
}
