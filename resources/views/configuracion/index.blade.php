@extends('layouts.app')

@section('title', 'Configuración')
@section('page-title', 'Configuración')
@section('page-description', 'Parámetros generales y control administrativo del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Parámetros</h4>
        <p class="value">{{ $metricas['parametros'] }}</p>
        <span>Configuraciones disponibles</span>
    </div>

    <div class="card">
        <h4>Estado</h4>
        <p class="value">{{ $metricas['estado'] }}</p>
        <span>Condición operativa</span>
    </div>

    <div class="card">
        <h4>Modo</h4>
        <p class="value">{{ $metricas['modo'] }}</p>
        <span>Entorno actual</span>
    </div>

    <div class="card">
        <h4>Versión</h4>
        <p class="value">{{ $metricas['version'] }}</p>
        <span>Control de actualización</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Configuración del sistema</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('configuracion.store') }}">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="nombre_sistema">Nombre del sistema</label>
                <input
                    type="text"
                    id="nombre_sistema"
                    name="nombre_sistema"
                    value="{{ $configuracion->nombre_sistema }}"
                    required>
            </div>

            <div class="form-group">
                <label for="version">Versión</label>
                <input
                    type="text"
                    id="version"
                    name="version"
                    value="{{ $configuracion->version }}"
                    required>
            </div>

            <div class="form-group">
                <label for="modo">Modo</label>
                <select id="modo" name="modo" required>
                    <option value="Pruebas" {{ $configuracion->modo == 'Pruebas' ? 'selected' : '' }}>Pruebas</option>
                    <option value="Producción" {{ $configuracion->modo == 'Producción' ? 'selected' : '' }}>Producción</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    <option value="Activo" {{ $configuracion->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Mantenimiento" {{ $configuracion->estado == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input
                    type="text"
                    id="responsable"
                    name="responsable"
                    value="{{ $configuracion->responsable }}"
                    required>
            </div>

            <div class="form-group">
                <label for="actualizacion">Última actualización</label>
                <input
                    type="text"
                    id="actualizacion"
                    value="{{ $configuracion->actualizacion }}"
                    disabled>
            </div>
        </div>

        <button type="submit" class="btn">Guardar configuración</button>
    </form>
</div>

<div class="card">
    <h3>Parámetros actuales</h3>

    <table>
        <thead>
            <tr>
                <th>Parámetro</th>
                <th>Valor</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre del sistema</td>
                <td>{{ $configuracion->nombre_sistema }}</td>
                <td>Identificador principal del software</td>
            </tr>
            <tr>
                <td>Versión</td>
                <td>{{ $configuracion->version }}</td>
                <td>Control de evolución del sistema</td>
            </tr>
            <tr>
                <td>Modo</td>
                <td>{{ $configuracion->modo }}</td>
                <td>Entorno de operación activo</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{ $configuracion->estado }}</td>
                <td>Condición funcional del sistema</td>
            </tr>
            <tr>
                <td>Responsable</td>
                <td>{{ $configuracion->responsable }}</td>
                <td>Encargado de administración del sistema</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection