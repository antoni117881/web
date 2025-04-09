<?php
// modelo/Cesta.php

class CartModel {
    public function getProducts() {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        return $cart;
    }
}