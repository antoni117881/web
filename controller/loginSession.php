<?php
    require_once __DIR__. '/model/model_LoginSession.php'
    require_once __DIR__. '/model/model_Login_BBDD.php'

    $conection = DB::getInstance();

    $conection_ok = login($conection,$_POST["userName"],$_POST["password"])

    if ($conection_ok) {
        $_SESSION["username"] = $_POST["username"];
        include __DIR__ . '/../views/login_ok.php';
    } else {
        $error = "Usuari o contrasenya incorrectes";
        include __DIR__ . '';
    }



?>