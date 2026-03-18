@extends('layouts.app')

@section('title', 'Análisis')
@section('page-title', 'Análisis emocional')
@section('page-description', 'Clasificación de emociones')

@section('content')
<div class="grid-2">
    <div class="card">
        <h3>Motor de análisis</h3>
        <p>Procesa variables conductuales y genera una emoción estimada.</p>
        <ul>
            <li>Tiempo promedio: 1.84 s</li>
            <li>Errores: 4</li>
            <li>Aciertos: 18</li>
            <li>Desempeño: 82%</li>
        </ul>
    </div>

    <div class="card">
        <h3>Resultado</h3>
        <p>Emoción detectada: <strong>Alegría</strong></p>
        <p>Confianza: <strong>87%</strong></p>
    </div>
</div>
@endsection
