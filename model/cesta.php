<?php
// modelo/Cesta.php

function addToCart($productId) {
    if (!$productId) {
        echo json_encode(["status" => "error", "message" => "ID de producto no válido"]);
        return;
    }

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    if (!in_array($productId, $cart)) {
        $cart[] = $productId;
    }

    setcookie('cart', json_encode($cart), time() + 3600, '/');
    echo json_encode(["status" => "success", "cart" => $cart]);

    
}
function getCartItems() {
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        // Es buena idea verificar si json_decode funcionó y devolvió un array
        if (is_array($cart)) {
            return $cart;
        }
    }
}
function removeFromCart($productId) {
   
    
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        if (($key = array_search($productId, $cart)) !== false) {
            unset($cart[$key]);
            setcookie('cart', json_encode(array_values($cart)), time() + (86400 * 30), "/"); // 30 días
        }
    }
}