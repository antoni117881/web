<?php
// Funcion para mostrar los productos de inicio
function ProductosInicio($conection)   {    
    $consulta_productos = $conection->prepare("SELECT DISTINCT * FROM productos");
    $consulta_productos->execute();
    $resultados = $consulta_productos->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}

class ProductoModelo {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerTodosProductos() {
        try {
            $consulta = $this->db->prepare("SELECT DISTINCT * FROM productos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en obtenerTodosProductos: " . $e->getMessage());
            return false;
        }
    }

    // Método nuevo para obtener un producto específico
    public function obtenerProductoPorId($id) {
        try {
            $consulta = $this->db->prepare("SELECT * FROM productos WHERE id_producto = :id");
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en obtenerProductoPorId: " . $e->getMessage());
            return false;
        }
    }
}
