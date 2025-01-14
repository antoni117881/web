<html>
    <head>
        <title> Crear Cuenta</title>
         <link rel="stylesheet" href="StylesResource.css">
</head>

<body>
        <!--localhost/web/index.php?action=RegistreUsuario  -->
    <div>
        <h1> Resgistrate </h1>

    </div>

    <div class="Container-Registre"> 

        <div class="Form_Registre">
            <form action="?action=controller_registre.php" method="post">
          
                <label for="nameAccount">Nombre de cuenta: </label>
                <input type="text" id="nameAccount" name="nameAccount" >
                </br></br>
                <label for="first_name" >Nombre: </label>
                <input type="text" id="first_name" name="first_name" >
                </br></br>
                <label for="last_name" >Apellidos: </label>
                <input type="text" id="last_name" name="last_name" >
                </br></br>
                <label for="email">Correo electronico: </label>
                <input type="text" id="mail" name="mail" >
                </br></br>
                <label for="password">Contraseña: </label>
                <input type="password" id="password" name="password">
                </br></br>
                <label for="address">Direccion: </label>
                <input type="text" id="address" name="address" >
                </br></br>
                <label for="phone">Numero movil : </label>
                <input type="text" id="phone" name="phone" >
                </br></br>
                <input type="submit" value="Registrar">
            </form>
            

        </div>  
       

    </div>
</body>
</html>