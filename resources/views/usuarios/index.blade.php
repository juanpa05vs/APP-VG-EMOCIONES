@extends('layouts.app')

@section('title', 'Usuarios')
@section('page-title', 'Usuarios')
@section('page-description', 'Gestión, organización y control de cuentas del sistema')

@section('content')
<div class="grid-4">
    <div class="card">
        <h4>Total de usuarios</h4>
        <p class="value">{{ $metricas['total'] }}</p>
        <span>Registros disponibles</span>
    </div>

    <div class="card">
        <h4>Administradores</h4>
        <p class="value">{{ $metricas['administradores'] }}</p>
        <span>Control del sistema</span>
    </div>

    <div class="card">
        <h4>Investigadores</h4>
        <p class="value">{{ $metricas['investigadores'] }}</p>
        <span>Seguimiento de información</span>
    </div>

    <div class="card">
        <h4>Usuarios</h4>
        <p class="value">{{ $metricas['usuarios'] }}</p>
        <span>Cuentas operativas</span>
    </div>
</div>

<div class="card" style="margin-bottom: 20px;">
    <h3>Registrar usuario</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre del usuario" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="correo@dominio.com" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="Usuario">Usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Investigador">Investigador</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
            </div>
        </div>

        <button type="submit" class="btn">Guardar usuario</button>
    </form>
</div>

<div class="card">
    <h3>Listado de usuarios</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <span class="badge 
                            @if($usuario->rol === 'Administrador') badge-purple
                            @elseif($usuario->rol === 'Investigador') badge-blue
                            @else badge-gray
                            @endif
                        ">
                        {{ $usuario->rol }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $usuario->estado === 'Activo' ? 'badge-green' : 'badge-yellow' }}">
                        {{ $usuario->estado }}
                    </span>
                </td>
                <td>{{ $usuario->fecha_registro }}</td>
                <td style="display:flex; gap:8px; flex-wrap:wrap;">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary" style="text-decoration:none;">Editar</a>

                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Eliminar usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No hay usuarios registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection