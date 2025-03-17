<?php
require_once __DIR__ . '/../model/conection_BD.php';

class ProductViewController {
    private $modelo;
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
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
}