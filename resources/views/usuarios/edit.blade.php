@extends('layouts.app')

@section('title', 'Editar usuario')
@section('page-title', 'Editar usuario')
@section('page-description', 'Actualización de datos y permisos de cuenta')

@section('content')
<div class="card">
    <h3>Editar usuario</h3>

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="Usuario" {{ $usuario->rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
                    <option value="Administrador" {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="Investigador" {{ $usuario->rol == 'Investigador' ? 'selected' : '' }}>Investigador</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" required>
                    <option value="Activo" {{ $usuario->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Pendiente" {{ $usuario->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Inactivo" {{ $usuario->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="form-group" style="grid-column: span 2;">
                <label for="password">Nueva contraseña</label>
                <input type="password" id="password" name="password" placeholder="Déjala vacía para no cambiarla">
            </div>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <button type="submit" class="btn">Actualizar usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary" style="text-decoration:none;">Cancelar</a>
        </div>
    </form>
</div>
@endsection