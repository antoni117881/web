<?php
require_once __DIR__ . '/../model/conection_BD.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function obtenerProductos() {
        $consulta = $this->db->prepare("SELECT * FROM productos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
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

    public function guardarProducto($nombre, $descripcion, $precio, $stock) {
        try {
            $consulta = $this->db->prepare("INSERT INTO productos 
                (nombre, descripcion, precio, stock) 
                VALUES (?, ?, ?, ?)");
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $precio, PDO::PARAM_INT);
            $consulta->bindParam(4, $stock, PDO::PARAM_INT);
            $consulta->execute();
            return $this->db->lastInsertId();
        } catch(PDOException $e) {
            error_log("Error en guardarProducto: " . $e->getMessage());
            return false;
        }
    }

    public function deleteProduct($id) { 
        try {
            $consulta = $this->db->prepare("DELETE FROM productos WHERE id_producto = :id");
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error en deleteProduct: " . $e->getMessage());
            return false;
        }
    }
}
