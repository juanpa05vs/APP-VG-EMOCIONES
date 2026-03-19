<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ConfiguracionController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Rutas principales del sistema
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
*/

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

/*
|--------------------------------------------------------------------------
| Partidas
|--------------------------------------------------------------------------
*/

Route::get('/partidas', [PartidaController::class, 'index'])->name('partidas.index');
Route::post('/partidas', [PartidaController::class, 'store'])->name('partidas.store');

/*
|--------------------------------------------------------------------------
| Análisis
|--------------------------------------------------------------------------
*/

Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis.index');
Route::post('/analisis', [AnalisisController::class, 'store'])->name('analisis.store');

/*
|--------------------------------------------------------------------------
| Reportes
|--------------------------------------------------------------------------
*/

Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');

/*
|--------------------------------------------------------------------------
| Historial
|--------------------------------------------------------------------------
*/

Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');

/*
|--------------------------------------------------------------------------
| Configuración
|--------------------------------------------------------------------------
*/

Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
Route::post('/configuracion', [ConfiguracionController::class, 'store'])->name('configuracion.store');
