<?php 
// Evita cualquier salida antes del encabezado
ob_start();

require_once __DIR__ . '/../../model/Producto_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

header('Content-Type: application/json');

try {
    $raw = file_get_contents("php://input");

    if (!$raw) {
        throw new Exception('No se recibieron datos');
    }

    $data = json_decode($raw, true);

    if (!isset($data['id_producto']) || !is_numeric($data['id_producto'])) {
        throw new Exception('ID del producto inválido o no proporcionado');
    }

    $id = intval($data['id_producto']);
    $producto = new ProductoModel();

    if ($producto->deleteProduct($id)) {
        $response = [
            'success' => true,
            'message' => 'Producto eliminado correctamente'
        ];
    } else {
        throw new Exception('Error al eliminar el producto');
    }
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

// Limpiar cualquier salida previa
ob_end_clean();

// Enviar respuesta JSON
echo json_encode($response);
exit;
