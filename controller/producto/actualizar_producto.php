<?php
require_once __DIR__ . '/../../model/Producto_M.php';

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ?action=PanelAdmin');
    exit;
}

// Obtener los datos del formulario
$id_producto = $_POST['id_producto'] ?? null;
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$precio = $_POST['precio'] ?? 0;
$stock = $_POST['stock'] ?? 0;
$categoria = $_POST['categoria'] ?? '';

// Validar que tengamos todos los datos necesarios
if (!$id_producto || !$nombre || !$descripcion || !$precio || !$stock || !$categoria) {
    // Redirigir con error
    header('Location: ?action=ModificarProducto&id=' . $id_producto . '&error=1');
    exit;
}

try {
    $productoModel = new ProductoModel();
    
    // Actualizar el producto
    $resultado = $productoModel->actualizarProducto(
        $id_producto,
        $nombre,
        $descripcion,
        $precio,
        $stock,
        $categoria
    );

    if ($resultado) {
        // Redirigir al panel de admin con mensaje de éxito
        header('Location: ?action=PanelAdmin&success=1');
    } else {
        // Redirigir con error
        header('Location: ?action=ModificarProducto&id=' . $id_producto . '&error=2');
    }
} catch (Exception $e) {
    // Redirigir con error
    header('Location: ?action=ModificarProducto&id=' . $id_producto . '&error=3');
}

exit;
