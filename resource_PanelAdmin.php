<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Administración</title>
    <?php include __DIR__. "/view/header.php"; ?>
    <style>
        /* Contenedor principal como grid: panel fijo a la izquierda y contenido mayor a la derecha */
        .Pagina {
            display: grid;
            grid-template-columns: 1fr 4fr; /* Panel fijo 250px, container el resto */
            height: 100vh; /* Ocupa toda la altura viewport */
            margin: 0;
        }

        /* Panel fijo a la izquierda sin bordes ni sombras, ocupa toda la altura */
        .Panel {
 
            top: 0;
            height: 100vh; /* Altura completa */
            background-color: #222; /* Un fondo oscuro para diferenciar */
         
            overflow: visible; /* Sin scroll ni overflow */
            box-sizing: border-box;
            /* Sin bordes ni radio */
            border-radius: 0;
            box-shadow: none;
        }

        /* Container_Menu ocupa el espacio restante, fondo blanco o claro para destacar */
        .Container_Menu {
            background-color: #fafafa;
           /* Solo aquí scroll si es necesario */
            height: 100vh;
            box-sizing: border-box;
        }

        /* Para móviles apilamos */
        @media (max-width: 768px) {
            .Pagina {
                display: block;
                height: auto;
            }

            .Panel {
                position: relative;
                height: auto;
                padding: 15px 20px;
            }

            .Container_Menu {
                height: auto;
                padding: 20px 20px 40px;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>
