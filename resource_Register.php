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
            <form action="?action=SaveRegistre" method="post">
          
                <label for="nameAccount">Nombre de cuenta: </label>
                <input type="text" id="nameAccount" name="nameAccount" minlength ="8" maxlength ="12" placeholder="Nombre de Cuenta">
                </br></br>
                <label for="first_name" >Nombre: </label>
                <input type="text" id="first_name" name="first_name"  minlength ="4" maxlength ="12"placeholder="Nombre">
                </br></br>
                <label for="last_name" >Apellidos: </label>
                <input type="text" id="last_name" name="last_name"  minlength ="4" maxlength ="12" placeholder="Apellidos">
                </br></br>
                <label for="email">Correo electronico: </label>
                <input type="text" id="email" name="email" placeholder="Correo Electronico o Gmail">
                </br></br>
                <label for="password">Contraseña: </label>
                <input type="password" id="password" name="password" minlength ="8" maxlength ="16" placeholder="Contraseña">
                </br></br>
                <label for="address">Direccion: </label minlength ="8" maxlength ="12" >
                <input type="text" id="address" name="address" placeholder="C/..direccion">
                </br></br>
                <label for="phone">Numero movil : </label>
                <input  type="text" id="phone" name="phone"  minlength ="9" maxlength ="9" placeholder="Introduce 9 digitos">
                </br></br>
                <input type="submit" value="Registrarme">
            </form>
            

        </div>  
       

    </div>
</body>
</html>