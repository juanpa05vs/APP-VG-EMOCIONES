<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - EmotionPlay</title>
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-left">
                <h2>Registro de usuario</h2>
                <p>Crea una nueva cuenta para acceder al sistema.</p>
            </div>

            <div class="login-right">
                <h3>Registrarme</h3>

                @if ($errors->any())
                    <div style="color:red; margin-bottom:15px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="form-login">
                    @csrf

                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre">
                    </div>

                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="usuario@correo.com">
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="Mínimo 8 caracteres">
                    </div>

                    <button type="submit" class="btn">Crear cuenta</button>
                </form>

                <p style="margin-top:15px;">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
