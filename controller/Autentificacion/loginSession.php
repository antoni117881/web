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
        $sesion_ok = true;
        $_SESSION["SesionStart"] = true;
        header("Location: index.php?action=Home");
        exit();
    } else {
        echo $conection_ok;
        $error = "Usuari o contrasenya incorrectes";
        echo "<script>alert('error en Controller/Autentificacion/loginSESSION')</script>";
        $sesion_ok= false;
        $_SESSION["SesionStart"] = false;
    }



?>