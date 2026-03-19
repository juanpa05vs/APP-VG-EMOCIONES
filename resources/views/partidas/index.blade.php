@extends('layouts.app')

@section('title', 'Partidas')
@section('page-title', 'Partidas')
@section('page-description', 'Registro de sesiones')

@section('content')
<div class="card">
    <h3>Registrar partida</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('partidas.store') }}">
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
                <label>Fecha</label>
                <input type="date" name="fecha" required>
            </div>

            <div class="form-group">
                <label>Tiempo de respuesta</label>
                <input type="number" step="0.01" name="tiempo_respuesta" required>
            </div>

            <div class="form-group">
                <label>Observaciones</label>
                <input type="text" name="observaciones">
            </div>
        </div>

        <button type="submit" class="btn">Guardar partida</button>
    </form>
</div>

<div class="card">
    <h3>Listado de partidas</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Tiempo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partidas as $partida)
                <tr>
                    <td>{{ $partida->id }}</td>
                    <td>{{ $partida->user->name }}</td>
                    <td>{{ $partida->fecha }}</td>
                    <td>{{ $partida->tiempo_respuesta }} s</td>
                    <td>{{ $partida->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay partidas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection