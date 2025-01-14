<?php

session_start();
$action = $_GET['action'] ?? null; 

switch ($action){

    // USERS
    case 'LoginUser':
        include __DIR__.'/resource_LoginSession.php';
        break;
    case 'RegistreUsuario':
            include __DIR__.'/resource_Register.php';
            break;
    
    case 'SaveRegistre':
            include __DIR__.'/controller/save_registre.php';
            break;

  

        
    default:
        include __DIR__.'/resource_Menu.php';
        break;

}

?>