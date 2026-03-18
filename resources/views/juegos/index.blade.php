@extends('layouts.app')

@section('title', 'Videojuegos')
@section('page-title', 'Videojuegos')
@section('page-description', 'Catálogo de juegos interactivos')

@section('content')
<div class="grid-3">
    <div class="card">
        <h3>Reacción visual</h3>
        <p>Evalúa velocidad de respuesta, precisión y tiempo de reacción.</p>
    </div>

    <div class="card">
        <h3>Patrones y secuencias</h3>
        <p>Mide memoria, concentración y comportamiento.</p>
    </div>

    <div class="card">
        <h3>Precisión cognitiva</h3>
        <p>Analiza atención, enfoque y capacidad de corrección.</p>
    </div>
</div>
@endsection
