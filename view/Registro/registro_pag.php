
<div class="">
            <?php
            include __DIR__. "/../header.php";
            ?>
   </div>
    <div class="Container-Menu">
        <div class="Container-Registre">
        <h1>Regístrate</h1>
            <div class="Form_Registre">
            <form action="?action=RegistreSave" method="post">
                    <label for="nameAccount">Nombre de cuenta:</label>
                    <input type="text" id="nameAccount" name="nameAccount"  maxlength="12" placeholder="Nombre de Cuenta">
                    <br><br>
                    <label for="first_name">Nombre:</label>
                    <input type="text" id="first_name" name="first_name" maxlength="12" placeholder="Nombre">
                    <br><br>

                    <label for="last_name">Apellidos:</label>
                    <input type="text" id="last_name" name="last_name" maxlength="12" placeholder="Apellidos" >
                    <br><br>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" maxlength="20" placeholder="Correo Electrónico">
                    <br><br>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" maxlength="12" placeholder="Contraseña" >
                    <br><br>

                    <label for="address">Dirección:</label>
                    <input type="text" id="address" name="address" maxlength="16" placeholder="C/ Direccion "> (opcional)</input>
                    <br><br>

                    <label for="phone">Número móvil:</label>
                    <input type="text" id="phone" name="phone" maxlength="9" placeholder="Número Móvil"> (opcional)</input>
                    <br><br>

                    <select name="questionList" id="questionList">
                        <option value="question1"id="question1">¿Cual es tu apodo?</option>
                        <option value="question2"id="question2">¿Nombre de tu primera mascota?</option>
                        <option value="question3"id="question3">¿Palabra clave?</option>
                    </select>
                    
                    <input type="text" id="response" name="response" maxlength="9" placeholder="Respuesta">
                </br></br>

                    <input type="submit" value="Registrarme">
                </form>
            </div>
        </div>
    </div>
