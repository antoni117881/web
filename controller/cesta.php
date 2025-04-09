<?php
require_once __DIR__ . '/../model/cesta.php';
require_once __DIR__ . '/../model/conection_BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new CartController();
    if (isset($_POST['product_id'])) {
        $controller->removeProduct();
    } elseif ($_GET['action'] === 'clear_cart') {
        $controller->clearCart(); // Llamar al nuevo método para vaciar la cesta
    }
}

class CartController {
    public function addToCart() {
        $productId = $_POST['product_id'] ?? null;
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

    public function removeProduct() {
        if (isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];

            $model = new CartModel();
            $model->removeProductFromCart($productId);

            echo "Producto eliminado con éxito";
        } else {
            echo "No se recibió un ID de producto válido.";
        }
    }

    // Método para vaciar toda la cesta
    public function clearCart() {
        setcookie('cart', json_encode([]), time() - 3600, '/'); // Vaciar la cesta (eliminar la cookie)
        echo "Cesta vacía con éxito";
    }
}
?>
