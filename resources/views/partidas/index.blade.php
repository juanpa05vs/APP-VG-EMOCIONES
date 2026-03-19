@extends('layouts.app')

@section('title', 'Partidas')
@section('page-title', 'Partidas')
@section('page-description', 'Registro y control de sesiones del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Total de partidas</h4>
        <p class="value">{{ $metricas['total'] }}</p>
        <span>Registros disponibles</span>
    </div>

    <div class="card">
        <h4>Procesadas</h4>
        <p class="value">{{ $metricas['procesadas'] }}</p>
        <span>Sesiones validadas</span>
    </div>

    <div class="card">
        <h4>Pendientes</h4>
        <p class="value">{{ $metricas['pendientes'] }}</p>
        <span>Registros en revisión</span>
    </div>

    <div class="card">
        <h4>Promedio</h4>
        <p class="value">{{ $metricas['promedio'] }} s</p>
        <span>Tiempo de respuesta</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Registrar partida</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('partidas.store') }}">
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
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>

            <div class="form-group">
                <label for="tiempo_respuesta">Tiempo de respuesta</label>
                <input type="number" step="0.01" id="tiempo_respuesta" name="tiempo_respuesta" placeholder="2.80" required>
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" id="observaciones" name="observaciones" placeholder="Descripción breve">
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
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partidas as $partida)
            <tr>
                <td>#{{ $partida->id }}</td>
                <td>{{ $partida->user->name ?? 'Sin usuario' }}</td>
                <td>{{ $partida->fecha }}</td>
                <td>{{ $partida->tiempo_respuesta }} s</td>
                <td>
                    <span class="badge {{ $partida->estado === 'Procesada' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $partida->estado }}
                    </span>
                </td>
                <td>{{ $partida->observaciones }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No hay partidas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection