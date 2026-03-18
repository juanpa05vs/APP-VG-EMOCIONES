@extends('layouts.app')

@section('title', 'Reportes')
@section('page-title', 'Reportes')
@section('page-description', 'Resultados del análisis emocional')

@section('content')
<div class="card">
    <h3>Reporte emocional</h3>
    <p><strong>Nombre:</strong> David Luna</p>
    <p><strong>Juego:</strong> Reacción visual</p>
    <p><strong>Emoción:</strong> Alegría</p>
    <p><strong>Desempeño:</strong> 82%</p>

    <button class="btn">Exportar PDF</button>
</div>
@endsection
