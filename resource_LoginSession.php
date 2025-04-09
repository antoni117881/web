<html lang="ca">

<head>
    <title> Login Session </title>
   
    <style> 
    
    .container{
        display: flex;rgb(241, 241, 241)rgba(241, 241, 241, 0.59)rgba(241, 241, 241, 0.59)rgb(241, 241, 241)rgb(241, 241, 241)rgb(178, 255, 241)
        justify-content: center;
        align-items: center;
        height: 100%;
        background-color:rgb(208, 255, 247);
        align-items: center;
        justify-content: center;
    }
    .container-Login{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #f1f1f1;
        border-radius: 10px;
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 400px; */
    }
    .Form_Login{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color:rgb(192, 255, 225);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 400px;
    } 
    .Form_Login label{
        font-size: 20px;
        font-family: math;
    }
    .Form_Login input{
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
       
    }
    .BottonLogear{
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid rgb(255, 255, 255);
        background-color: #4CAF50;
        color: white;
        font-size: 20px;
        font-family: math; 
        cursor: pointer;
        
    }
    .BottonLogear:hover{
        
       transform: scale(1.1);
        background-color:rgb(27, 111, 31);
    }
    </style>
</head>

<body>
    <div>
    <?php
    include __DIR__. "/view/header.php";
    ?>
    </div>
    </br> 
    <div class="container">
        <div class="container-Login">
           
            
            <div class="Form_Login">
            <h1>Iniciar Session  </h1>  
                <form action="?action=LoginController" method="post">
                    <label for="nameAccount">Name User </label>
                    <input type="text" id="nameAccount" name="nameAccount" maxlength="12" required>
                </br>
                    <label for="password">Password: </label>
                    <input type="password" id="password" maxlength="12" name="password"required>
            
                </br>
                <input class="BottonLogear" type="submit" value="Iniciar Session"></br>
                </form>
                <div >
                    <a href="?action=NewPassword" class="btn" >Restaurar Contraseña</a>
                    <a href="?action=Registro" class="btn-Login">Crear Cuenta</a>
                </div>

            </div>  
        </div>
    </div>
    </br> 
    <footer>
        Footer
    </footer>

</body>
</html>