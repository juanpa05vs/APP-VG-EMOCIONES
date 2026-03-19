@extends('layouts.app')

@section('title', 'Historial')
@section('page-title', 'Historial')
@section('page-description', 'Actividad reciente del sistema')

@section('content')
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
            </tr>
        </thead>
        <tbody>
            @forelse($historial as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item['fecha'])->format('Y-m-d H:i') }}</td>
                    <td>{{ $item['usuario'] }}</td>
                    <td>{{ $item['modulo'] }}</td>
                    <td>{{ $item['resultado'] }}</td>
                    <td>{{ $item['observacion'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay movimientos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection