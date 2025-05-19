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
    case 'ModificarProducto':
        include __DIR__.'/view/Administrador/Funciones/modificar_Producto_V.php';
        break;
    case 'ActualizarProducto':
        include __DIR__.'/controller/producto/actualizar_producto.php';
        break;
    case 'SaveProducts':
        include __DIR__.'/controller/producto/guardarProducto_C.php';
        break;
    case 'carrito':
        include __DIR__.'/controller/cesta.php';
        break;
        case 'borrarcarrito':
            include __DIR__.'/controller/borrarCesta.php';
            break;

    // Usuarios
    case 'ModificarUsuario':
        include __DIR__.'/view/Administrador/Funciones/modificar_Usuario_V.php';
        break;
    case 'MostrarUsuarios':
        include __DIR__.'/view/Administrador/Funciones/mostrar_Usuarios_V.php';
        break;
    case 'Profile':
        include __DIR__.'/resource_Profile.php';
        break;

    // View 

    default:
        include __DIR__.'/resource_Menu.php';
        break;
    }
?>