<?php

session_start();
$action = $_GET['action'] ?? null; 

switch ($action){

    case 'LoginUser':
        include __DIR__.'/resource_LoginSession.php';
        break;

        
    default:
        include __DIR__.'/resource_Menu.php';
        break;
        


}

?>