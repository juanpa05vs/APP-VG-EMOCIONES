@extends('layouts.app')

@section('title', 'Configuración')
@section('page-title', 'Configuración')
@section('page-description', 'Parámetros generales')

@section('content')
<div class="card">
    <h3>Configuración del sistema</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('configuracion.store') }}">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Nombre del sistema</label>
                <input type="text" name="nombre_sistema" value="{{ $configuracion->nombre_sistema }}" required>
            </div>

            <div class="form-group">
                <label>Versión</label>
                <input type="text" name="version" value="{{ $configuracion->version }}" required>
            </div>

            <div class="form-group">
                <label>Modo</label>
                <select name="modo" required>
                    <option value="Pruebas" {{ $configuracion->modo == 'Pruebas' ? 'selected' : '' }}>Pruebas</option>
                    <option value="Producción" {{ $configuracion->modo == 'Producción' ? 'selected' : '' }}>Producción</option>
                </select>
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="Activo" {{ $configuracion->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Mantenimiento" {{ $configuracion->estado == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn">Guardar configuración</button>
    </form>