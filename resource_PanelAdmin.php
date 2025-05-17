<?php
// Incluir solo el header
include __DIR__. "/view/header.php";
?>

<div class="Pagina">
    <!-- Panel lateral izquierdo -->
    <div class="Panel">
        <?php
        include __DIR__. "/view/Administrador/Panel_Admin_V.php";
        ?>
    </div>

    <!-- Contenido principal derecho -->
    <div class="Container_Menu">
        <?php
        $adminAction = $_POST['adminAction'] ?? 'ver_productos';

        // Funciones de Productos
        if ($adminAction === 'añadir_producto') {
            include __DIR__ . '/view/Administrador/Funciones/añadir_Producto_V.php';
        } elseif ($adminAction === 'eliminar_producto') {
            include __DIR__ . '/view/Administrador/Funciones/eliminar_Producto_V.php';
        } elseif ($adminAction === 'modificar_producto') {
            include __DIR__ . '/view/Administrador/Funciones/modificar_Producto_V.php';
        } elseif ($adminAction === 'ver_productos') {
            include __DIR__ . '/view/Administrador/Funciones/mostrar_Productos_V.php';
        }

        // Funciones de Usuarios
        elseif ($adminAction === 'añadir_usuario') {
            include __DIR__ . '/view/Administrador/Funciones/añadir_Usuario_V.php';
        } elseif ($adminAction === 'eliminar_usuario') {
            include __DIR__ . '/view/Administrador/Funciones/eliminar_Usuario_V.php';
        } elseif ($adminAction === 'modificar_usuario') {
            include __DIR__ . '/view/Administrador/Funciones/modificar_Usuario_V.php';
        } elseif ($adminAction === 'ver_usuarios') {
            include __DIR__ . '/view/Administrador/Funciones/mostrar_Usuarios_V.php';
        }

        // Por defecto
        else {
            include __DIR__ . '/view/Administrador/Funciones/mostrar_Productos_V.php';
        }
        ?>
    </div>
</div>
<style>
 


</style>

