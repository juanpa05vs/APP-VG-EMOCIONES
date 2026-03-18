<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-left">
                <h2>Sistema web de monitoreo emocional</h2>
                <p>Selecciona una opción para continuar dentro del sistema.</p>
            </div>

            <div class="login-right">
                <h3>Bienvenido</h3>
                <p>Accede con tu cuenta o crea una nueva cuenta de usuario.</p>

                <div style="display:flex; gap:15px; flex-wrap:wrap; margin-top:20px;">
                    <a href="{{ route('login') }}" class="btn" style="text-decoration:none;">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn" style="text-decoration:none; background:#ec4899;">Registrarme</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>