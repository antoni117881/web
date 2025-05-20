<?php
require_once __DIR__ . '/model/Producto_M.php';

$productoModel = new ProductoModel();
$productos = $productoModel->obtenerProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="StylesResource.css">
</head>
<body>
    <?php include __DIR__. "/view/header.php"; ?>
    <div id="main-content">
        <div class="productos-container">
            <h1>NUESTROS PRODUCTOS</h1>
            <?php include __DIR__."/view/Productos/card_productos.php"; ?>
        </div>
        <style>
            .productos-container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 20px;
            }
            .productos-container h1 {
                margin-bottom: 20px;
                text-align: center;
                color: #1a1a1a;
                font-size: 2rem;
                font-weight: 700;
            }
        </style>
    </div>
    <?php include __DIR__. "/view/footer.php"; ?>
</body>
</html>
