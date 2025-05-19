<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../model/Producto_M.php';

error_log('Llegó al controlador guardarProducto_C.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categoria = $_POST['categoria'] ?? '';

    // Validación básica
    if (empty($nombre) || empty($descripcion) || empty($precio) || empty($stock) || empty($categoria)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    $producto = new ProductoModel();
    $resultado = $producto->guardarProducto($nombre, $descripcion, $precio, $stock, $categoria);

    if (is_numeric($resultado) && $resultado > 0) {
        echo json_encode(['success' => true, 'message' => 'Producto guardado correctamente']);
    } else {
        // Aquí muestra el error exacto del PDO para ayudarte a debuggear
        echo json_encode(['success' => false, 'message' => 'Error al guardar producto: ' . $resultado]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
