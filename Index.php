<?php
// index.php
session_start();

// Inicializar la variable $action
$action = isset($_GET['action']) ? $_GET['action'] : 'default'; // Valor predeterminado

switch ($action) { //aquí solo apuntamos a controladores y resource no a modulos
    
    // Resource (PAGINAS)
    case 'Home':
        include __DIR__.'/resource_Menu.php';
        break;
    case 'LoginUser':
        include __DIR__.'/resource_LoginSession.php';
        break;
    case 'Registro':
        include __DIR__.'/resource_Register.php';
        break;
    case 'Productos':
        include __DIR__.'/resource_Productos.php';
        break;  
    case 'NewPassword':
        include __DIR__.'/resource_ResetPassword.php';
        break;
           
    case 'Producto':
        include __DIR__.'/resource_Producto.php';
        break;

    case 'PanelAdmin':
        include __DIR__. '/resource_PanelAdmin.php';
        break;
    // Controller 
    case 'RegistreSave':
            include __DIR__.'/controller/Autentificacion/save_registre.php';
            break;
    case 'ResetPasword':
            include __DIR__.'/controller/reset_password.php';
            break;
    case 'LoginController':
            include __DIR__.'/controller/Autentificacion/loginSession.php';
            break;
    case 'ProductosPag':
            include __DIR__.'/resource_Productos.php';
             break;   
    case 'exitLogin':
        include __DIR__.'/controller/Autentificacion/exitLogin.php';
        break;
    case 'cesta':
        include __DIR__.'/view/vista_cesta.php';
         break;
    case 'SaveProducts':
        include __DIR__.'/controller/producto/guardarProducto_C.php';
        break;

    // View 

    default:
        include __DIR__.'/resource_Menu.php';
        break;
    }
?>