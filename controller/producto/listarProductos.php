<?php 
    require_once __DIR__ . '/../../model/Producto_M.php';
    require_once __DIR__ . '/../../model/conection_BD.php';

    echo "<script>alert('Entro al controlador')</script>"; // Solo para depuración

    $productoModel = new ProductoModel();
    $productos = $productoModel->obtenerProductos();

    if (!$productos) {
        echo "No hay productos";
    }
?>
