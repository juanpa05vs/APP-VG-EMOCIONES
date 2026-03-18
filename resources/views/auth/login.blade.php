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

                <form method="POST" action="#">
                    @csrf
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" placeholder="usuario@correo.com">
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
            </div>
        </div>
    </div>
</body>
</html>
