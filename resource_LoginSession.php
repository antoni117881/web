<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Login Session</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(90deg, rgb(82, 78, 215), rgb(71, 114, 232), #86a8e7);
            animation: moveGradient 5s ease-in-out infinite alternate;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 40px 20px;
        }

        .container-login {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 30px;
            width: 100%;
            max-width: 420px;
        }

        .form-login {
            display: flex;
            flex-direction: column;
        }

        .form-login h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-login label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        .form-login input[type="text"],
        .form-login input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: border-color 0.3s;
        }

        .form-login input:focus {
            border-color: #547df7;
            outline: none;
        }

        .boton-logear {
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, rgb(82, 78, 215), rgb(71, 114, 232));
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .boton-logear:hover {
            background: linear-gradient(90deg, rgb(61, 57, 190), rgb(51, 95, 212));
        }

        .form-links {
            margin-top: 20px;
            text-align: center;
        }

        .form-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #334ccf;
            font-weight: 500;
        }

        .form-links a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        @keyframes moveGradient {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }
    </style>
</head>

<body>
    <div>
        <?php include __DIR__ . "/view/header.php"; ?>
    </div>

    <div class="container">
        <div class="container-login">
            <form action="?action=LoginController" method="post" class="form-login">
                <h1>Iniciar Sesión</h1>

                <label for="nameAccount">Usuario</label>
                <input type="text" id="nameAccount" name="nameAccount" maxlength="12" required>

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" maxlength="12" required>

                <input type="submit" value="Iniciar Sesión" class="boton-logear">

                <div class="form-links">
                    <a href="?action=NewPassword">¿Olvidaste tu contraseña?</a>
                    <a href="?action=Registro">Crear Cuenta</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        Footer
    </footer>
</body>

</html>
