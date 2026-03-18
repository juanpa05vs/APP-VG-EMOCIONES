@extends('layouts.app')

@section('title', 'Configuración')
@section('page-title', 'Configuración')
@section('page-description', 'Seguridad y parámetros del sistema')

@section('content')
<div class="card">
    <h3>Seguridad del sistema</h3>
    <p>Autenticación obligatoria: Activa</p>
    <p>Cifrado de datos: Activo</p>
    <p>Control de roles: Implementado</p>
</div>
@endsection
