<?php

namespace App\Http\Controllers;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = collect([
            [
                'fecha' => '2026-03-18 10:30',
                'usuario' => 'Juan Pablo',
                'modulo' => 'Usuarios',
                'resultado' => 'Registro actualizado',
                'observacion' => 'Se modificó el rol a Administrador',
                'estado' => 'Completado',
            ],
            [
                'fecha' => '2026-03-18 09:50',
                'usuario' => 'Charbel Pérez',
                'modulo' => 'Partidas',
                'resultado' => 'Sesión registrada',
                'observacion' => 'Tiempo de respuesta de 3.10 s',
                'estado' => 'Pendiente',
            ],
            [
                'fecha' => '2026-03-18 09:10',
                'usuario' => 'Karol Garfias',
                'modulo' => 'Análisis',
                'resultado' => 'Calma detectada',
                'observacion' => 'Confianza del 79%',
                'estado' => 'Completado',
            ],
            [
                'fecha' => '2026-03-17 17:40',
                'usuario' => 'David Luna',
                'modulo' => 'Reportes',
                'resultado' => 'Reporte generado',
                'observacion' => 'Tipo resumen de última semana',
                'estado' => 'Completado',
            ],
            [
                'fecha' => '2026-03-17 15:20',
                'usuario' => 'Administrador',
                'modulo' => 'Configuración',
                'resultado' => 'Parámetros actualizados',
                'observacion' => 'Cambio de modo a Pruebas',
                'estado' => 'Completado',
            ],
            [
                'fecha' => '2026-03-16 13:15',
                'usuario' => 'Juan Pablo',
                'modulo' => 'Partidas',
                'resultado' => 'Sesión registrada',
                'observacion' => 'Registro validado automáticamente',
                'estado' => 'Completado',
            ],
        ]);

        $metricas = [
            'total' => $historial->count(),
            'completados' => $historial->where('estado', 'Completado')->count(),
            'pendientes' => $historial->where('estado', 'Pendiente')->count(),
            'modulos' => $historial->pluck('modulo')->unique()->count(),
        ];

        return view('historial.index', compact('historial', 'metricas'));
    }
}
