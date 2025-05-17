<?php
require_once __DIR__ . '/../model/cesta.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
   $productId=$_POST['id_producto']; 
  
   echo var_dump($_POST) ;
    if (isset($productId)) {
        addToCart($productId);
    }
}
?>
