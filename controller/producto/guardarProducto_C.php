<?php 

    require_once __DIR__ . '/../../model/Producto_M.php';
    require_once __DIR__ . '/../../model/conection_BD.php';

    $mensajeError = [];
   
        $_SESSION['productName'] = $_POST['productName'];
        $_SESSION['productDescription'] = $_POST['productDescription'];
        $_SESSION['productPrice'] = $_POST['productPrice']; 
        $_SESSION['productStock'] = $_POST['productStock'];
        $_SESSION['productImage'] = $_POST['productImage'];

        $producto = new ProductoModel();
        
        $producto->guardarProducto($_SESSION['productName'], $_SESSION['productDescription'], $_SESSION['productPrice'], $_SESSION['productStock'], $_SESSION['productImage']);
        if($producto){
            echo "Producto guardado correctamente";
            include __DIR__ . '/../../resource_Menu.php';
        }else{
            echo "Error al guardar el producto";
        }


?>