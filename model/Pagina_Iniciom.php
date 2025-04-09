<?php
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
    public function deleteProduct($id) { 
        try {
            $consulta = $this->db->prepare("DELETE FROM productos WHERE id_producto = :id");
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
    
            // Verificar si se eliminó algún registro
            if ($consulta->rowCount() > 0) {
                echo "<script>alert('SE HA ELIMINADO PRODUCTO');</script>";
                return true; // 
            } else {
                return false; // No se eliminó ningún registro
            }
        } catch (PDOException $e) {
            error_log("Error en deleteProduct: " . $e->getMessage());
            return false;
        }
    }
}


function ProductosInicio($conection) {    
    $consulta_productos = $conection->prepare("SELECT DISTINCT * FROM productos");
    $consulta_productos->execute();
    return $consulta_productos->fetchAll(PDO::FETCH_ASSOC);
}