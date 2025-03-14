<!-- view/vista_cesta.php -->
<?php require_once 'controller/cesta.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta de Compras</title>
</head>
<body>
    <h1>Cesta de Compras</h1>
    <ul>
        <?php foreach ($this->cesta->getProductos() as $producto): ?>
            <li><?php echo htmlspecialchars($producto['nombre']); ?> - Precio: $<?php echo number_format($producto['precio'], 2); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>