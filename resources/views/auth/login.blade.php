<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body class="auth-body">
    <div class="auth-shell">
        <div class="auth-card">
            <div class="auth-left">
                <div class="auth-badge">EmotionPlay</div>
                <h1>Iniciar sesión</h1>
                <p>
                    Accede al sistema con tus credenciales para entrar al panel
                    administrativo y navegar por los módulos disponibles.
                </p>

                <div class="auth-points">
                    <div>✔ Acceso para administrador, investigador y usuario</div>
                    <div>✔ Interfaz Laravel para maquetado funcional</div>
                    <div>✔ Diseño visual más limpio y profesional</div>
                </div>
            </div>

            <div class="auth-right">
                <a href="{{ route('home') }}" class="back-link">← Volver al inicio</a>

                <h2>Acceso al sistema</h2>
                <p class="auth-subtext">Ingresa tus datos para continuar.</p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.authenticate') }}" class="auth-form">
                    @csrf

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="usuario@correo.com"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Ingresa tu contraseña"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="rol">Tipo de acceso</label>
                        <select id="rol" name="rol" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Investigador">Investigador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">Entrar al sistema</button>
                </form>

                <p class="auth-footer-text">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>