<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>

<body class="auth-body">
    <div class="auth-shell">
        <div class="auth-card auth-card-home">
            <div class="auth-left">
                <div class="auth-badge">EmotionPlay</div>
                <h1>Sistema web de monitoreo emocional</h1>
                <p>
                    Plataforma para gestionar usuarios, sesiones, análisis,
                    reportes e historial dentro de una interfaz centralizada.
                </p>

                <div class="auth-points">
                    <div>✔ Gestión organizada de información</div>
                    <div>✔ Procesos automatizados de captura y consulta</div>
                    <div>✔ Interfaz administrativa del proyecto</div>
                </div>
            </div>

            <div class="auth-right">
                <h2>Bienvenido</h2>
                <p class="auth-subtext">
                    Selecciona una opción para continuar.
                </p>

                <div class="auth-actions">
                    <a href="{{ route('login') }}" class="btn btn-primary auth-btn-link">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary auth-btn-link">Registrarme</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>