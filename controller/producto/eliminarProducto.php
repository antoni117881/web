<?php 

    require_once __DIR__ . '/../../model/Producto_M.php';
    require_once __DIR__ . '/../../model/conection_BD.php';

   
    //* recupera los datos /View/Administrador/Funnciones/eliminarProducto
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id_producto'];

    // $nombre = $data['nombre'];

    $producto = new ProductoModel();

    $producto -> deleteProduct($id);



?>