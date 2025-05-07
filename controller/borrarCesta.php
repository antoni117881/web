<?php
require_once __DIR__ . '/../model/cesta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $productId=$_POST['id_producto']; 
    removeFromCart($productId);
}
?>
