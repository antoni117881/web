<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="/web/css/common.css">
    <style>
        /* Contenedor principal como grid: panel fijo a la izquierda y contenido mayor a la derecha */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .main-header {
            flex-shrink: 0;
        }

        .main-footer {
            flex-shrink: 0;
        }

        .Pagina {
            flex: 1;
            display: flex;
            position: relative;
            /* Altura del header */
        }

        /* Panel fijo a la izquierda */
        .Panel {
             /* Alineado con el header */
            bottom: 0; /* Se extiende hasta abajo */
            width: 250px;
            background-color:rgb(57, 64, 98);
            border-right: 1px solid #e1e1e1;
            overflow-y: auto; /* Scroll si el contenido es largo */
            padding: 20px;
            box-sizing: border-box;
        }

        /* Contenedor principal */
        .Container_Menu {
            margin-left: 250px; /* Igual al ancho del panel */
            flex: 1;
            background-color: #FFFFFF;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto; /* Scroll independiente */
            min-height: calc(100vh - 143px - 300px); /* Altura total - header - espacio para footer */
        }

        /* Para móviles apilamos */
        @media (max-width: 768px) {
            .Pagina {
                flex-direction: column;
                margin-top: 0;
            }

            .Panel {
                position: relative;
                width: 100%;
                top: 0;
                height: auto;
            }

            .Container_Menu {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__. "/view/header.php"; ?>
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
    <?php include __DIR__. "/view/footer.php"; ?>
</body>
</html>
