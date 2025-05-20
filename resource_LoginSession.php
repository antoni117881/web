<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Session</title>
    <link rel="stylesheet" href="css/common.css">
    <style>
        .container-login {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 30px;
            width: 100%;
            max-width: 420px;
            margin: 40px auto;
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
    </style>
</head>

<body>
    <?php include __DIR__ . "/view/header.php"; ?>
    
    <div id="main-content">
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

    <?php include __DIR__ . "/view/footer.php"; ?>
</body>

</html>
