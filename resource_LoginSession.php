<html lang="ca">

<head>
    <title> Login Session </title>
    <link rel="stylesheet" href="StylesResource.css">
</head>

<body>
    <div>
    <?php
    include __DIR__. "/view/header.php";
    ?>
    </div>
    </br> 
    <div>  <h1>Iniciar Session  </h1>  

    </div>
    
    <div class="Form_Login">
        <form action="?action=LoginController" method="post">
            
            <label for="nameAccount">Name User </label>
            <input type="text" id="nameAccount" name="nameAccount" maxlength="12" required>
        </br>
            <label for="password">Password: </label>
            <input type="password" id="password" maxlength="12" name="password"required>
       
        </br>
        <input type="submit" value="Iniciar Session"></br>
        
        </form>
        <div >
            <a href="?action=NewPassword" class="btn" >Restaurar Contraseña</a>
            <a href="?action=Registro" class="btn-Login">Crear Cuenta</a>
        </div>

    </div>  
    </br> 
    <footer>
        Footer
    </footer>

</body>
</html>