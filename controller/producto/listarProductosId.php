<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../model/Producto_M.php';

try {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['id_producto']) || empty($data['id_producto'])) {
        throw new Exception('ID del producto no proporcionado');
    }

    $id = (int)$data['id_producto'];

    $productoModel = new ProductoModel();
    $producto = $productoModel->obtenerProductoPorId($id);

    if ($producto) {
        echo json_encode([
            'success' => true,
            'producto' => $producto
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Producto no encontrado'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
exit;
