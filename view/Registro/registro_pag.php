<div>
    <?php include __DIR__ . "/../header.php"; ?>
</div>

<div class="container-menu">
    <div class="container-register">
        <h1>Regístrate</h1>
        <form action="?action=RegistreSave" method="post" class="formulario">
            <div class="form-group">
                <label for="nameAccount">Nombre de cuenta</label>
                <input type="text" id="nameAccount" name="nameAccount" maxlength="12" placeholder="Nombre de Cuenta" class="input">
            </div>

            <div class="form-group">
                <label for="first_name">Nombre</label>
                <input type="text" id="first_name" name="first_name" maxlength="12" placeholder="Nombre" class="input">
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" id="last_name" name="last_name" maxlength="12" placeholder="Apellidos" class="input">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" maxlength="20" placeholder="Correo Electrónico" class="input">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" maxlength="12" placeholder="Contraseña" class="input">
            </div>

            <div class="form-group">
                <label for="address">Dirección (opcional)</label>
                <input type="text" id="address" name="address" maxlength="16" placeholder="C/ Dirección" class="input">
            </div>

            <div class="form-group">
                <label for="phone">Número móvil (opcional)</label>
                <input type="text" id="phone" name="phone" maxlength="9" placeholder="Número Móvil" class="input">
            </div>

            <div class="form-group">
                <label for="questionList">Pregunta de seguridad</label>
                <select name="questionList" id="questionList" class="input">
                    <option value="question1">¿Cuál es tu apodo?</option>
                    <option value="question2">¿Nombre de tu primera mascota?</option>
                    <option value="question3">¿Palabra clave?</option>
                </select>
            </div>

            <div class="form-group">
                <label for="response">Respuesta</label>
                <input type="text" id="response" name="response" maxlength="9" placeholder="Respuesta" class="input">
            </div>

            <button type="submit" class="botonregistro">Registrarme</button>
        </form>
    </div>
</div>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
}

.container-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.container-register {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

.container-register h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

.formulario .form-group {
    margin-bottom: 20px;
}

.formulario label {
    display: block;
    margin-bottom: 6px;
    color: #444;
    font-weight: bold;
}

.input {
    width: 100%;
    padding: 10px 14px;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.input:focus {
    border-color: #547df7;
    outline: none;
}

.botonregistro {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(90deg, rgb(82, 78, 215), rgb(71, 114, 232));
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.botonregistro:hover {
    background: linear-gradient(90deg, rgb(61, 57, 190), rgb(51, 95, 212));
}
</style>
