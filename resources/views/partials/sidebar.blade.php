<aside class="sidebar">
    <div class="brand">
        <h2>EmotionPlay</h2>
        <p>Panel de administración</p>
    </div>

    <nav class="nav">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('usuarios.index') }}" class="nav-link">Usuarios</a>
        <a href="{{ route('partidas.index') }}" class="nav-link">Partidas</a>
        <a href="{{ route('analisis.index') }}" class="nav-link">Análisis</a>
        <a href="{{ route('reportes.index') }}" class="nav-link">Reportes</a>
        <a href="{{ route('historial.index') }}" class="nav-link">Historial</a>
        <a href="{{ route('configuracion.index') }}" class="nav-link">Configuración</a>
    </nav>
</aside>