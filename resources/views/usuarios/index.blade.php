@extends('layouts.app')

@section('title', 'Usuarios')
@section('page-title', 'Usuarios')
@section('page-description', 'Gestión de usuarios del sistema')

@section('content')
<div class="grid-2">
    <div class="card">
        <h3>Registrar usuario</h3>
        <form>
            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" placeholder="Nombre del usuario">
            </div>

            <div class="form-group">
                <label>Edad</label>
                <input type="number" placeholder="16">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" placeholder="correo@dominio.com">
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select>
                    <option>Usuario final</option>
                    <option>Administrador</option>
                    <option>Investigador</option>
                </select>
            </div>

            <button class="btn">Guardar usuario</button>
        </form>
    </div>

    <div class="card">
        <h3>Listado de usuarios</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pablo</td>
                    <td>Administrador</td>
                    <td>Activo</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
