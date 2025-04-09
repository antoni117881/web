<?php
require_once 'model/cesta.php'; // Incluir el modelo correctamente
$model = new CartModel(); // Crear una instancia del modelo
$cart = $model->getProducts(); // Obtener los productos de la cookie
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cesta de Compras</title>
    
</head>
<body>
<?php
            include __DIR__. "/header.php";
            ?>
    <h1>Cesta de Compras</h1>
    <button onclick="clearCart()">Vaciar Cesta</button>
    <ul id="cart-list">
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $productId): ?>
                <li id="product-<?= htmlspecialchars($productId) ?>">
                    Producto ID: <?= htmlspecialchars($productId) ?>
                    <button onclick="removeProduct(<?= htmlspecialchars($productId) ?>)">Eliminar</button>
                </li>
            <?php endforeach; ?>
            
        <?php else: ?>
            <li>La cesta está vacía.</li>
        <?php endif; ?>
    </ul>
</body>
</html>

<script>
   function removeProduct(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "?action=carrito", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("product_id=" + productId);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var productItem = document.getElementById("product-" + productId);
            if (productItem) {
                productItem.remove();
            }
        }
    };
}

function clearCart() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "?action=clear_cart", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onload = function() {
        if (xhr.status === 200) {
            var cartList = document.getElementById("cart-list");
            cartList.innerHTML = "<li>La cesta está vacía.</li>";
        }
    };
}

</script>
