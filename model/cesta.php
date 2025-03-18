<?php
// modelo/Cesta.php

class Cesta {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addProductoa($id_usuario, $id_producto) {
        // Verificar si el producto ya está en la cesta
        $stmt = $this->conn->prepare("SELECT * FROM carrito WHERE id_usuario = ? AND id_producto = ?");
        $stmt->bind_param("ii", $id_usuario, $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Si ya existe, puedes aumentar la cantidad o manejarlo como desees
            $stmt = $this->conn->prepare("UPDATE carrito SET cantidad = cantidad + 1 WHERE id_usuario = ? AND id_producto = ?");
            $stmt->bind_param("ii", $id_usuario, $id_producto);
        } else {
            // Si no existe, agregarlo a la cesta
            $stmt = $this->conn->prepare("INSERT INTO carrito (id_usuario, id_producto) VALUES (?, ?)");
            $stmt->bind_param("ii", $id_usuario, $id_producto);
        }
        return $stmt->execute();
    }

    public function getProductos($id_usuario) {
        $stmt = $this->conn->prepare("SELECT p.* FROM carrito c JOIN productos p ON c.id_producto = p.id_producto WHERE c.id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductoPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id_producto = ?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addProducto($data) {
        header('Content-Type: application/json'); // Asegúrate de establecer el tipo de contenido
        if (isset($_SESSION['user_id'])) {
            $id_usuario = $_SESSION['user_id'];
            $result = $this->cestaModel->addProducto($id_usuario, $data['id_producto']);
            
            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al añadir el producto.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado.']);
        }
        exit();
    }
}
?>