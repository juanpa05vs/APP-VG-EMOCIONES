@extends('layouts.app')

@section('title', 'Análisis')
@section('page-title', 'Análisis')
@section('page-description', 'Resultados emocionales')

@section('content')
<div class="card">
    <h3>Registrar análisis</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('analisis.store') }}">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Partida</label>
                <select name="partida_id" required>
                    <option value="">Selecciona</option>
                    @foreach($partidas as $partida)
                        <option value="{{ $partida->id }}">
                            #{{ $partida->id }} - {{ $partida->user->name }} - {{ $partida->fecha }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Emoción detectada</label>
                <select name="emocion_detectada" required>
                    <option>Alegría</option>
                    <option>Tristeza</option>
                    <option>Estrés</option>
                    <option>Calma</option>
                    <option>Frustración</option>
                </select>
            </div>

            <div class="form-group">
                <label>Confianza (%)</label>
                <input type="number" name="confianza" min="0" max="100" required>
            </div>

            <div class="form-group">
                <label>Recomendación</label>
                <input type="text" name="recomendacion">
            </div>
        </div>

        <button type="submit" class="btn">Guardar análisis</button>
    </form>
</div>

<div class="card">
    <h3>Listado de análisis</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Emoción</th>
                <th>Confianza</th>
                <th>Recomendación</th>
            </tr>
        </thead>
        <tbody>
            @forelse($analisis as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->partida->user->name }}</td>
                    <td>{{ $item->emocion_detectada }}</td>
                    <td>{{ $item->confianza }}%</td>
                    <td>{{ $item->recomendacion }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay análisis registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection