<aside class="sidebar">
    <div class="brand">
        <div class="brand-icon">🎮</div>
        <div>
            <h1>EmotionPlay</h1>
            <p>Panel de administración</p>
        </div>
    </div>

    <div class="menu-label">Acceso</div>
    <div class="nav">
        <a href="{{ route('login') }}" class="nav-link">🔐 Login</a>
    </div>

    <div class="menu-label">Sistema</div>
    <div class="nav">
        <a href="{{ route('dashboard') }}" class="nav-link">📊 Dashboard</a>
        <a href="{{ route('usuarios.index') }}" class="nav-link">👤 Usuarios</a>
        <a href="{{ route('juegos.index') }}" class="nav-link">🕹️ Videojuegos</a>
        <a href="{{ route('partidas.index') }}" class="nav-link">⏱️ Partidas</a>
        <a href="{{ route('analisis.index') }}" class="nav-link">🧠 Análisis</a>
        <a href="{{ route('reportes.index') }}" class="nav-link">📄 Reportes</a>
        <a href="{{ route('historial.index') }}" class="nav-link">🗂️ Historial</a>
        <a href="{{ route('configuracion.index') }}" class="nav-link">⚙️ Configuración</a>
    </div>
</aside>
