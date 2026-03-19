<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>

<body class="auth-body">
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-left">
                <div class="auth-badge">EmotionPlay</div>
                <h1>Registro de usuario</h1>
                <p>
                    Crea una cuenta para acceder al sistema y formar parte
                    de la plataforma de gestión.
                </p>

                <div class="auth-points">
                    <div>✔ Registro estructurado</div>
                    <div>✔ Validación de información</div>
                    <div>✔ Integración con el panel administrativo</div>
                </div>
            </div>

            <div class="auth-right">
                <a href="{{ route('home') }}" class="back-link">← Volver al inicio</a>

                <h2>Crear cuenta</h2>
                <p class="auth-subtext">Completa los datos solicitados.</p>

                @if($errors->any())
                <div class="alert alert-error">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="auth-form">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Tu nombre completo"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="usuario@correo.com"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Mínimo 8 caracteres"
                            required>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-full">Crear cuenta</button>
                </form>

                <p class="auth-footer-text">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>