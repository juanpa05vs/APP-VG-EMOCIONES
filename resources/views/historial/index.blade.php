@extends('layouts.app')

@section('title', 'Historial')
@section('page-title', 'Historial')
@section('page-description', 'Consulta consolidada y trazabilidad de movimientos del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Total de movimientos</h4>
        <p class="value">{{ $metricas['total'] }}</p>
        <span>Eventos registrados</span>
    </div>

    <div class="card">
        <h4>Completados</h4>
        <p class="value">{{ $metricas['completados'] }}</p>
        <span>Procesos finalizados</span>
    </div>

    <div class="card">
        <h4>Pendientes</h4>
        <p class="value">{{ $metricas['pendientes'] }}</p>
        <span>Eventos en seguimiento</span>
    </div>

    <div class="card">
        <h4>Módulos involucrados</h4>
        <p class="value">{{ $metricas['modulos'] }}</p>
        <span>Áreas con actividad registrada</span>
    </div>
</div>

<div class="card">
    <h3>Historial general</h3>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Módulo</th>
                <th>Resultado</th>
                <th>Observación</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($historial as $item)
            <tr>
                <td>{{ $item['fecha'] }}</td>
                <td>{{ $item['usuario'] }}</td>
                <td>{{ $item['modulo'] }}</td>
                <td>{{ $item['resultado'] }}</td>
                <td>{{ $item['observacion'] }}</td>
                <td>
                    <span class="badge {{ $item['estado'] === 'Completado' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $item['estado'] }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No hay movimientos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection