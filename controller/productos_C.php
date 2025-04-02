<?php
require_once __DIR__ . '/../model/Pagina_Iniciom.php';
require_once __DIR__ . '/../model/conection_BD.php';

$db = DB::getInstance();
$modelo = new ProductoModelo($db);

class ProductController {
    
    private $modelo;
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
        $this->modelo = new ProductoModelo($this->db);
    }

    public function obtenerProducto($id) {
        return $this->modelo->obtenerProductoPorId($id);
    }

    public function mostrarVistaProducto($id) {
        $producto = $this->obtenerProducto($id);
        
        if (!$producto) {
            return [
                'error' => true,
                'mensaje' => 'Producto no encontrado'
            ];
        }

        return [
            'error' => false,
            'producto' => $producto
        ];
    }
    
    // Método para generar el botón en el listado de productos
    public function generarBotonProducto($id_producto) {
        $id_producto = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    // Inicializar el controlador
         $controlador = new ProductoModelo();
        $resultado = $controlador->mostrarVistaProducto($id_producto);
        return sprintf(
            '<a href="resource_ProductView.php?id=%d" class="btn-producto">
                Ver Producto #%d
            </a>',
            $id_producto,
            $id_producto
        );
    }

    

}