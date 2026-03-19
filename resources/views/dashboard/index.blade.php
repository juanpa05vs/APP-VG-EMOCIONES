@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Panel general de gestión de información del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Usuarios</h4>
        <p class="value">{{ $metricas['usuarios'] }}</p>
        <span>Registros en plataforma</span>
    </div>

    <div class="card">
        <h4>Partidas</h4>
        <p class="value">{{ $metricas['partidas'] }}</p>
        <span>Sesiones registradas</span>
    </div>

    <div class="card">
        <h4>Análisis</h4>
        <p class="value">{{ $metricas['analisis'] }}</p>
        <span>Procesos ejecutados</span>
    </div>

    <div class="card">
        <h4>Reportes</h4>
        <p class="value">{{ $metricas['reportes'] }}</p>
        <span>Resultados generados</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Procesos automatizados del sistema</h3>

    <div class="form-grid">
        @foreach($procesos as $proceso)
        <div style="background:#f8fafc; border:1px solid #e5e7eb; border-radius:14px; padding:18px;">
            <h4 style="margin-top:0;">{{ $proceso['titulo'] }}</h4>
            <p style="margin:0; color:#64748b; line-height:1.6;">
                {{ $proceso['descripcion'] }}
            </p>
        </div>
        @endforeach
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
            @foreach($actividad as $item)
            <tr>
                <td>{{ $item['usuario'] }}</td>
                <td>{{ $item['modulo'] }}</td>
                <td>{{ $item['resultado'] }}</td>
                <td>{{ $item['hora'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection