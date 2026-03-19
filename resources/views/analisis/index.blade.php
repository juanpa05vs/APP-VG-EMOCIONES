@extends('layouts.app')

@section('title', 'Análisis')
@section('page-title', 'Análisis')
@section('page-description', 'Procesamiento e interpretación automatizada de información')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Total de análisis</h4>
        <p class="value">{{ $metricas['total'] }}</p>
        <span>Procesos ejecutados</span>
    </div>

    <div class="card">
        <h4>Validados</h4>
        <p class="value">{{ $metricas['validado'] }}</p>
        <span>Resultados confirmados</span>
    </div>

    <div class="card">
        <h4>Pendientes</h4>
        <p class="value">{{ $metricas['pendiente'] }}</p>
        <span>Registros en revisión</span>
    </div>

    <div class="card">
        <h4>Confianza media</h4>
        <p class="value">{{ $metricas['promedio_confianza'] }}%</p>
        <span>Precisión estimada</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Registrar análisis</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('analisis.store') }}">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="partida_id">Partida</label>
                <select id="partida_id" name="partida_id" required>
                    <option value="">Selecciona una partida</option>
                    @foreach($partidas as $partida)
                    <option value="{{ $partida->id }}">
                        #{{ $partida->id }} - {{ $partida->user->name ?? 'Sin usuario' }} - {{ $partida->fecha }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="emocion_detectada">Emoción detectada</label>
                <select id="emocion_detectada" name="emocion_detectada" required>
                    <option value="Alegría">Alegría</option>
                    <option value="Tristeza">Tristeza</option>
                    <option value="Estrés">Estrés</option>
                    <option value="Calma">Calma</option>
                    <option value="Frustración">Frustración</option>
                </select>
            </div>

            <div class="form-group">
                <label for="confianza">Confianza (%)</label>
                <input type="number" id="confianza" name="confianza" min="0" max="100" placeholder="87" required>
            </div>

            <div class="form-group">
                <label for="recomendacion">Recomendación</label>
                <input type="text" id="recomendacion" name="recomendacion" placeholder="Continuar seguimiento">
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
                <th>Partida</th>
                <th>Usuario</th>
                <th>Emoción</th>
                <th>Confianza</th>
                <th>Estado</th>
                <th>Recomendación</th>
            </tr>
        </thead>
        <tbody>
            @forelse($analisis as $item)
            <tr>
                <td>#{{ $item->id }}</td>
                <td>#{{ $item->partida->id ?? '---' }}</td>
                <td>{{ $item->partida->user->name ?? 'Sin usuario' }}</td>
                <td>{{ $item->emocion_detectada }}</td>
                <td>{{ $item->confianza }}%</td>
                <td>
                    <span class="badge {{ $item->estado === 'Validado' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $item->estado }}
                    </span>
                </td>
                <td>{{ $item->recomendacion }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No hay análisis registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection