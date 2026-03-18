@extends('layouts.app')

@section('title', 'Usuarios')
@section('page-title', 'Usuarios')
@section('page-description', 'Gestión de usuarios del sistema')

@section('content')
<div class="card">
    <h3>Registrar usuario</h3>

    <form>
        <div class="form-grid">
            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" placeholder="Nombre del usuario">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" placeholder="correo@dominio.com">
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select>
                    <option>Usuario</option>
                    <option>Administrador</option>
                    <option>Investigador</option>
                </select>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" placeholder="Mínimo 8 caracteres">
            </div>
        </div>

        <button type="button" class="btn">Guardar usuario</button>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Juan Pablo</td>
                <td>juanpa05vs@gmail.com</td>
                <td>Administrador</td>
                <td>Activo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Charbel Pérez</td>
                <td>charbelp3@gmail.com</td>
                <td>Usuario</td>
                <td>Activo</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection