<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-left">
                <h2>Sistema web de monitoreo emocional</h2>
                <p>Acceso para administradores, investigadores y usuarios del sistema.</p>
            </div>

            <div class="login-right">
                <h3>Iniciar sesión</h3>

                @if (session('success'))
                    <div style="color:green; margin-bottom:15px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div style="color:red; margin-bottom:15px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.authenticate') }}" class="form-login">
                    @csrf

                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="usuario@correo.com">
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="••••••••">
                    </div>

                    <div class="form-group">
                        <label>Tipo de acceso</label>
                        <select name="rol">
                            <option>Administrador</option>
                            <option>Investigador</option>
                            <option>Usuario</option>
                        </select>
                    </div>

                    <button type="submit" class="btn">Entrar al sistema</button>
                </form>

                <p style="margin-top:15px;">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>