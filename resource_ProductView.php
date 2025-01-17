<?php
require_once 'controller/Pagina_inicio.php';

// Obtener el ID del producto
$id_producto = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Obtener la conexión
$conection = DB::getInstance();

// Obtener los detalles del producto
function obtenerProductoPorId($conection, $id) {
    try {
        $query = "SELECT * FROM productos WHERE id = :id";
        $stmt = $conection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

$producto = obtenerProductoPorId($conection, $id_producto);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="StylesResource.css">
</head>
<body>
    <div class="container-producto">
        <?php if ($producto): ?>
            <div class="producto-detalle">
                <h1><?php echo $producto['nombre']; ?></h1>
                <div class="producto-info">
                    <img src="imagenes/<?php echo $producto['imagen']; ?>" 
                         alt="<?php echo $producto['nombre']; ?>"
                         class="producto-imagen-grande">
                    <div class="detalles">
                        <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                        <p class="precio">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <p class="categoria">Categoría: <?php echo $producto['categoria']; ?></p>
                    </div>
                </div>
                <a href="resource_Menu.php" class="btn-volver">Volver al Menú</a>
            </div>
        <?php else: ?>
            <div class="error">
                <p>Producto no encontrado</p>
                <a href="resource_Menu.php" class="btn-volver">Volver al Menú</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html> 