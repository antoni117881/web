<?php
require_once '/model/Producto.php';

class ProductoController {
    private $modelo;

    public function __construct($db) {
        $this->modelo = new Producto($db);
    }

    public function listarProductos() {
        return $this->modelo->obtenerTodosLosProductos();
    }

    public function mostrarDetalleProducto($id) {
        return $this->modelo->obtenerProductoPorId($id);
    }
}