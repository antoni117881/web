<?php
require_once __DIR__ . '/../model/conection_BD.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }  

    function obtenerProductos() {    
        $consulta_productos = $this->db->prepare("SELECT DISTINCT * FROM productos");
        $consulta_productos->execute();
        return $consulta_productos->fetchAll(PDO::FETCH_ASSOC);
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
    
    public function guardarProducto(
        $nombre, 
        $descripcion, 
        $precio, 
        $stock) {
        try {
            $consulta = $this->db->prepare("INSERT INTO productos 
            (nombre, 
            descripcion, 
            precio, 
            stock
            ) VALUES (?, ?, ?, ?)");
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $precio, PDO::PARAM_INT);
            $consulta->bindParam(4, $stock, PDO::PARAM_INT);
            $consulta->execute();
            $producto = $this->db->lastInsertId();
        } catch(PDOException $e) {
            echo "Error en guardarProducto: " . $e->getMessage();
            error_log("Error en guardarProducto: " . $e->getMessage());
            return false;
        }
    
        if (!$producto) {
            echo "no hay producto";
            return false;
        } else {
            echo "si hay producto";
            return $producto;
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