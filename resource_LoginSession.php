<html lang="ca">

<head>
    <title> Login Session </title>
    <link rel="stylesheet" href="StylesResource.css">
</head>

<body>
    <div> CABECERA</div>

    <div>  <h1>Iniciar Session  </h1>  

    </div>
    
    <div class="Form_Login">
        <form action="?action=controller_LoginSession" method="post">
            <label for="username">Name User </label>
            <input type="text" id="userName" name="userName" required>
        </br>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password">
        </br>
            <label for="email">mail:  </label>
            <input type="text" id="mail" name="mail" >
        </form>

    </div>   
    <footer>
        Footer
    </footer>

</body>
</html>