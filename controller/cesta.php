<?php
// controlador/CestaController.php

session_start(); // Asegúrate de iniciar la sesión

require_once $_SERVER['DOCUMENT_ROOT'] . '/web/model/cesta.php';

class CestaController {
    private $cestaModel;

    public function __construct($db) {
        $this->cestaModel = new Cesta($db);
    }

    public function addProducto($data) {
        if (isset($_SESSION['user_id'])) { // Asegúrate de que el usuario esté autenticado
            $id_usuario = $_SESSION['user_id'];
            $this->cestaModel->addProducto($id_usuario, $data['id_producto']);
            header("Location: view_productos.php"); // Redirigir a la página de productos
            exit();
        } else {
            // Manejar el caso en que el usuario no esté autenticado
            echo "Usuario no autenticado.";
        }
    }

    private function getProductoPorId($id) {
        // Aquí deberías implementar la lógica para obtener el producto por ID
        // Por ejemplo, podrías hacer una consulta a la base de datos
    }

    public function getProductos() {
        if (isset($_SESSION['user_id'])) {
            $id_usuario = $_SESSION['user_id'];
            return $this->cestaModel->getProductos($id_usuario);
        }
        return [];
    }
}
?>