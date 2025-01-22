
<?php
// index.php
session_start();

$action = $_GET['action'] ?? null; //es mas robusta ?? si es null 

switch ($action) { //aqui solo apuntamos a controladores y resource no a modulos
    // Default
    case 'LoginUser':
        include __DIR__.'/resource_LoginSession.php';
        break;
        
    case 'Registro':
        include __DIR__.'/resource_Register.php';
        break;
    case 'RegistreSave':
            include __DIR__.'/controller/save_registre.php';
            break;
    case 'LoginController':
            include __DIR__.'/controller/loginSession.php';
            break;
    
    case 'Productos':
            include __DIR__.'/resource_ProductView.php';
            break;  

    case 'NewPassword':
        include __DIR__.'/resource_ResetPassword.php';
        break;   
                

    default:
        include __DIR__.'/resource_Menu.php';
        break;
    }
?>