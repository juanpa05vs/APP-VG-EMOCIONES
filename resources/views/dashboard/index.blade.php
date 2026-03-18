@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Resumen general del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Usuarios</h4>
        <p class="value">128</p>
        <span>Registrados en plataforma</span>
    </div>

    <div class="card">
        <h4>Partidas</h4>
        <p class="value">342</p>
        <span>Sesiones almacenadas</span>
    </div>

    <div class="card">
        <h4>Reportes</h4>
        <p class="value">316</p>
        <span>Resultados generados</span>
    </div>

    <div class="card">
        <h4>Latencia</h4>
        <p class="value">2.8 s</p>
        <span>Tiempo promedio</span>
    </div>
</div>

<div class="card">
    <h3>Actividad reciente</h3>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Módulo</th>
                <th>Resultado</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>David Luna</td>
                <td>Análisis emocional</td>
                <td>Alegría</td>
                <td>09:14</td>
            </tr>
            <tr>
                <td>Karol Garfias</td>
                <td>Reporte</td>
                <td>Generado</td>
                <td>10:05</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection