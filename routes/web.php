<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ConfiguracionController;

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/juegos', [JuegoController::class, 'index'])->name('juegos.index');
Route::get('/partidas', [PartidaController::class, 'index'])->name('partidas.index');
Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis.index');
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
