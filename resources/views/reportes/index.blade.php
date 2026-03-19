@extends('layouts.app')

@section('title', 'Reportes')
@section('page-title', 'Reportes')
@section('page-description', 'Generación de reportes')

@section('content')
<div class="card">
    <h3>Generar reporte</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('reportes.store') }}">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Usuario</label>
                <select name="user_id" required>
                    <option value="">Selecciona</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" required>
                    <option>Individual</option>
                    <option>Resumen</option>
                    <option>General</option>
                </select>
            </div>

            <div class="form-group">
                <label>Periodo</label>
                <select name="periodo" required>
                    <option>Hoy</option>
                    <option>Última semana</option>
                    <option>Último mes</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn">Guardar reporte</button>
    </form>
</div>

<div class="card">
    <h3>Listado de reportes</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Periodo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->user->name }}</td>
                    <td>{{ $reporte->tipo }}</td>
                    <td>{{ $reporte->periodo }}</td>
                    <td>{{ $reporte->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay reportes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection