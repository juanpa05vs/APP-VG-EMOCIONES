@extends('layouts.app')

@section('title', 'Reportes')
@section('page-title', 'Reportes')
@section('page-description', 'Generación, organización y consulta de salidas informativas')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Total de reportes</h4>
        <p class="value">{{ $metricas['total'] }}</p>
        <span>Salidas registradas</span>
    </div>

    <div class="card">
        <h4>Generados</h4>
        <p class="value">{{ $metricas['generados'] }}</p>
        <span>Reportes emitidos</span>
    </div>

    <div class="card">
        <h4>Pendientes</h4>
        <p class="value">{{ $metricas['pendientes'] }}</p>
        <span>En proceso de salida</span>
    </div>

    <div class="card">
        <h4>Usuarios con reporte</h4>
        <p class="value">{{ $metricas['usuarios_con_reporte'] }}</p>
        <span>Cobertura registrada</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Generar reporte</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('reportes.store') }}">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <select id="user_id" name="user_id" required>
                    <option value="">Selecciona un usuario</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de reporte</label>
                <select id="tipo" name="tipo" required>
                    <option value="Individual">Individual</option>
                    <option value="Resumen">Resumen</option>
                    <option value="General">General</option>
                </select>
            </div>

            <div class="form-group">
                <label for="periodo">Periodo</label>
                <select id="periodo" name="periodo" required>
                    <option value="Hoy">Hoy</option>
                    <option value="Última semana">Última semana</option>
                    <option value="Último mes">Último mes</option>
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
                <th>Fecha</th>
                <th>Estado</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportes as $reporte)
            <tr>
                <td>#{{ $reporte->id }}</td>
                <td>{{ $reporte->user->name ?? 'Sin usuario' }}</td>
                <td>{{ $reporte->tipo }}</td>
                <td>{{ $reporte->periodo }}</td>
                <td>{{ $reporte->fecha_generacion }}</td>
                <td>
                    <span class="badge {{ $reporte->estado === 'Generado' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $reporte->estado }}
                    </span>
                </td>
                <td>{{ $reporte->descripcion }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No hay reportes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection