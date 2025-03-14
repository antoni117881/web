<?php
require_once __DIR__ . '/../model/Pagina_Iniciom.php';
require_once __DIR__ . '/../model/conection_BD.php';

class ProductViewController {
    private $modelo;
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
        $this->modelo = new ProductoModelo($this->db);
    }   
    
    public function guardarProducto($nombre, $descripcion, $precio, $stock) {
        $producto = $this->modelo->guardarProducto($nombre, $descripcion, $precio, $stock);
    
        if (!$producto) {
            return [
                'error' => true,
                'mensaje' => 'Producto no guardado'
            ];
        }

        return [
            'error' => false,
            'producto' => $producto
        ];  
    }


}