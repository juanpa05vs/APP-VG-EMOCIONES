@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
<div class="card">
    <h3>Editar usuario</h3>

    @if($errors->any())
        <div style="margin-bottom:15px; padding:10px; background:#fee2e2; color:#991b1b; border-radius:10px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="name" value="{{ old('name', $usuario->name) }}">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}">
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="rol">
                    <option value="Usuario" {{ $usuario->rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
                    <option value="Administrador" {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="Investigador" {{ $usuario->rol == 'Investigador' ? 'selected' : '' }}>Investigador</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nueva contraseña</label>
                <input type="password" name="password" placeholder="Déjala vacía para no cambiarla">
            </div>
        </div>

        <div style="display:flex; gap:10px;">
            <button type="submit" class="btn">Actualizar usuario</button>
            <a href="{{ route('usuarios.index') }}" class="btn" style="text-decoration:none; background:#64748b;">Cancelar</a>
        </div>
    </form>
</div>
@endsection