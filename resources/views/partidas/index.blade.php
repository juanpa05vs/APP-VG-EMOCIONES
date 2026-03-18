@extends('layouts.app')

@section('title', 'Partidas')
@section('page-title', 'Partidas')
@section('page-description', 'Registro de sesiones de juego')

@section('content')
<div class="grid-2">
    <div class="card">
        <h3>Registrar partida</h3>
        <form>
            <div class="form-group">
                <label>Usuario</label>
                <select>
                    <option>David Luna</option>
                </select>
            </div>

            <div class="form-group">
                <label>Videojuego</label>
                <select>
                    <option>Reacción visual</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tiempo de reacción</label>
                <input type="text" placeholder="1.84 s">
            </div>

            <button class="btn">Guardar partida</button>
        </form>
    </div>

    <div class="card">
        <h3>Sesiones recientes</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Juego</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#P-101</td>
                    <td>David</td>
                    <td>Reacción visual</td>
                    <td>Procesada</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
