<?php
require_once __DIR__ . '/conection_BD.php';

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
 

    // Aquí agregamos categoría como nuevo campo
    public function guardarProducto($nombre, $descripcion, $precio, $stock, $categoria) {
        error_log('Llegó al modelo Producto_M.php - método guardarProducto');
        try {
            $consulta = $this->db->prepare(
                "INSERT INTO productos (nombre, descripcion, precio, stock, categoria) VALUES (?, ?, ?, ?, ?)"
            );
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $precio);
            $consulta->bindParam(4, $stock, PDO::PARAM_INT);
            $consulta->bindParam(5, $categoria, PDO::PARAM_STR);
            $consulta->execute();

            return $this->db->lastInsertId();  // Retorna el id del producto insertado
        } catch (PDOException $e) {
            error_log("Error en guardarProducto: " . $e->getMessage());
            return $e->getMessage();  // Retornamos el mensaje del error para debugging
        }
    }
    
    public function actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $categoria) {
        try {
            $consulta = $this->db->prepare(
                "UPDATE productos 
                 SET nombre = :nombre, 
                     descripcion = :descripcion, 
                     precio = :precio, 
                     stock = :stock, 
                     categoria = :categoria 
                 WHERE id_producto = :id"
            );
            
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(':precio', $precio);
            $consulta->bindParam(':stock', $stock, PDO::PARAM_INT);
            $consulta->bindParam(':categoria', $categoria, PDO::PARAM_STR);
            
            return $consulta->execute();
        } catch (PDOException $e) {
            error_log("Error en actualizarProducto: " . $e->getMessage());
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

    public function editarProducto($id, $nombre, $descripcion, $precio, $stock, $categoria) {
        try {
            $consulta = $this->db->prepare(
                "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, categoria = ? WHERE id_producto = ?"
            );
            $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(2, $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(3, $precio);
            $consulta->bindParam(4, $stock, PDO::PARAM_INT);
            $consulta->bindParam(5, $categoria, PDO::PARAM_STR);
            $consulta->bindParam(6, $id, PDO::PARAM_INT);
            $consulta->execute();
    
            return $consulta->rowCount() > 0;  // Retorna true si se modificó alguna fila
        } catch (PDOException $e) {
            error_log("Error en editarProducto: " . $e->getMessage());
            return false;
        }
    }
    
}
