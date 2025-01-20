<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="StylesResource.css">
</head>
<body>
    <div>
        <h1>Regístrate</h1>
    </div>
    <div class="Container-Registre">
        <div class="Form_Registre">
        <form action="?action=RegistreSave" method="post">
                <label for="nameAccount">Nombre de cuenta:</label>
                <input type="text" id="nameAccount" name="nameAccount"  maxlength="12" placeholder="Nombre de Cuenta">
                <br><br>
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" maxlength="12" placeholder="Nombre">
                <br><br>

                <label for="last_name">Apellidos:</label>
                <input type="text" id="last_name" name="last_name" maxlength="12" placeholder="Apellidos">
                <br><br>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" maxlength="20" placeholder="Correo Electrónico">
                <br><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" maxlength="12" placeholder="Contraseña">
                <br><br>

                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address" maxlength="16" placeholder="Dirección">
                <br><br>

                <label for="phone">Número móvil:</label>
                <input type="text" id="phone" name="phone" maxlength="9" placeholder="Número Móvil">
                <br><br>

                <input type="submit" value="Registrarme">
            </form>
        </div>
    </div>
</body>
</html>
