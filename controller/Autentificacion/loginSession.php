<?php
    require_once __DIR__. '/../../model/conection_BD.php';
    require_once __DIR__. '/../../model/usuario_M.php';
    
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
        include __DIR__. '/../../resource_Menu.php';
        
       $sesion_ok = true;
       $_SESSION["SesionStart"] = true;

    }else {
        echo $conection_ok;
        $error = "Usuari o contrasenya incorrectes";
        echo "<script>alert('error en Controller/Autentificacion/loginSESSION')</script>";
        $sesion_ok= false;
        $_SESSION["SesionStart"] = false;
    }



?>