<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $metricas = [
            'usuarios' => 128,
            'partidas' => 342,
            'analisis' => 316,
            'reportes' => 94,
        ];

        $actividad = collect([
            [
                'usuario' => 'Juan Pablo',
                'modulo' => 'Usuarios',
                'resultado' => 'Registro actualizado',
                'hora' => '09:14'
            ],
            [
                'usuario' => 'Charbel Pérez',
                'modulo' => 'Partidas',
                'resultado' => 'Sesión registrada',
                'hora' => '10:05'
            ],
            [
                'usuario' => 'Karol Garfias',
                'modulo' => 'Análisis',
                'resultado' => 'Alegría detectada',
                'hora' => '11:20'
            ],
            [
                'usuario' => 'Administrador',
                'modulo' => 'Reportes',
                'resultado' => 'Reporte generado',
                'hora' => '12:10'
            ],
        ]);

        $procesos = collect([
            [
                'titulo' => 'Registro de usuarios',
                'descripcion' => 'Captura y organización de cuentas del sistema.',
            ],
            [
                'titulo' => 'Control de sesiones',
                'descripcion' => 'Registro estructurado de partidas y eventos.',
            ],
            [
                'titulo' => 'Procesamiento de análisis',
                'descripcion' => 'Interpretación de información y resultados.',
            ],
            [
                'titulo' => 'Generación de reportes',
                'descripcion' => 'Producción automatizada de salidas informativas.',
            ],
        ]);

        return view('dashboard.index', compact('metricas', 'actividad', 'procesos'));
    }
}
