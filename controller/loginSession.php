<?php
    require_once __DIR__. '/../model/conection_BD.php';
    require_once __DIR__. '/../model/users.php';

    $conection = DB::getInstance();

    $conection_ok = login(
        $conection, 
        $_POST['nameAccount'], 
        $_POST['password']
    );

    if($conection_ok) {
        $_SESSION["nameAccount"] = $_POST["nameAccount"];
        
        $savename = $_POST["nameAccount"];
        include __DIR__ . '/../view/login_ok.php';
    }else {
        $error = "Usuari o contrasenya incorrectes";
        include __DIR__ . '/../view/login_error.php';
    }



?>