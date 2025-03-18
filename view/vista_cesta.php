<!-- view/vista_cesta.php -->
<!-- <?php require_once 'controller/cesta.php';?> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta de Compras</title>
</head>
<body>
<div class="">
            <?php
            include __DIR__. "./header.php";
            ?>
   </div>
    <h1>Cesta de Compras</h1>
    <ul>
        <?php if (isset($productos) && !empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <li><?php echo htmlspecialchars($producto['nombre']); ?> - Precio: $<?php echo number_format($producto['precio'], 2); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay productos en la cesta.</li>
        <?php endif; ?>
    </ul>
</body>
</html>