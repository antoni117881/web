<?php
    require_once __DIR__. '/../model/conection_BD.php';
    require_once __DIR__. '/../model/users.php';
    
    $sesion_ok = false;
    $conection = DB::getInstance();
    
    if(empty($_POST['nameAccount'])||empty($_POST['password']) ){
        $sesion_ok = false;
    }
    $conection_ok = login(
        $conection, 
        $_POST['nameAccount'], 
        $_POST['password']
    );

    if($conection_ok) {
        $_SESSION["nameAccount"] = $_POST["nameAccount"];
        echo "redirigiendo a la pagina principal";
        include __DIR__. '/../resource_Menu.php';
       $sesion_ok = true;
       $_SESSION["SesionStart"] = true;

    }else {
        echo $conection_ok;
        $error = "Usuari o contrasenya incorrectes";
        include __DIR__ . '/../view/login_error.php';
        $sesion_ok= false;
        $_SESSION["SesionStart"] = false;
    }



?>