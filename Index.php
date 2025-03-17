<?php
// index.php
session_start();

// Inicializar la variable $action
$action = isset($_GET['action']) ? $_GET['action'] : 'default'; // Valor predeterminado

switch ($action) { //aquí solo apuntamos a controladores y resource no a modulos
    
    // Resource
    case 'LoginUser':
        include __DIR__.'/resource_LoginSession.php';
        break;
        
    case 'Registro':
        include __DIR__.'/resource_Register.php';
        break;
        
    case 'Productos':
        include __DIR__.'/resource_ProductView.php';
        break;  
    case 'NewPassword':
        include __DIR__.'/resource_ResetPassword.php';
        break;
           
    case 'NewPassword':
            include __DIR__.'/resource_ResetPassword.php';
            break;  
    case 'Producto':
        include __DIR__.'/resource_ProductView.php';
        break;
    // Controller 
    case 'RegistreSave':
            include __DIR__.'/controller/save_registre.php';
            break;
    case 'ResetPasword':
            include __DIR__.'/controller/reset_password.php';
            break;
    case 'LoginController':
            include __DIR__.'/controller/loginSession.php';
            break;
    case 'ProductosGeneral':
            include __DIR__.'/RegistroProductos.php';
             break;   
    case 'exitLogin':
        include __DIR__.'/controller/exitLogin.php';
        break;
    case 'cesta':
        include __DIR__.'/view/vista_cesta.php';
         break;
    case 'SaveProducts':
        include __DIR__.'/controller/guardar_producto.php';
        break;

    // View 
    case 'AdminAddProduct':
        include __DIR__.'/view/view_Admin_AddProduct.php';
        break;

    default:
        include __DIR__.'/resource_Menu.php';
        break;
    }
?>