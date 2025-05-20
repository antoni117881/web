<?php
// Asumimos que Cesta.php está en una ruta accesible, por ejemplo, ../model/Cesta.php
// Ajusta la ruta según tu estructura de directorios.
require_once __DIR__ . '/../model/Cesta.php'; // O la ruta correcta

// Obtener los productos del carrito
$cartItems = getCartItems(); // Esta es la nueva función

// Si se recibe una acción de eliminar (para procesar antes de mostrar)
// Esto es un ejemplo simplificado. Idealmente, esto se manejaría en un controlador
// o a través de una petición AJAX como la de añadir.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove' && isset($_POST['product_id'])) {
    removeFromCart($_POST['product_id']);
    // Redirigir para evitar reenvío del formulario al recargar
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de Compras</title>
    <link rel="stylesheet" href="/web/css/common.css">

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .container h1 {
            color: #1a237e;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            font-weight: 600;
        }

        #cart-list {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        #cart-list {
            list-style: none;
            padding: 0;
        }

        #cart-list li {
            background-color: #ffffff;
            padding: 16px 20px;
            margin-bottom: 12px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: all 0.2s ease;
            border: 1px solid #eee;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .product-name {
            font-size: 1rem;
            font-weight: 500;
            color: #2c3e50;
            margin: 0;
        }

        .product-id {
            font-size: 0.85rem;
            color: #95a5a6;
        }

        #cart-list li:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        #cart-list li:last-child {
            margin-bottom: 0;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: #ffffff;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .btn-delete::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.4);
            background-color: #c0392b;
        }

        .btn-delete:hover::before {
            transform: translateY(0);
        }

        .btn-delete:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(231, 76, 60, 0.2);
            background-color: #a93226;
        }

        .btn-delete svg {
            width: 20px;
            height: 20px;
            stroke-width: 2;
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
            color: #ffffff;
        }

        .btn-delete:hover svg {
            transform: scale(1.1);
        }

        .actions-container {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-details {
            background-color: #3498db;
            color: #ffffff;
            border: none;
            height: 42px;
            padding: 0 20px;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }

        .btn-details:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }

        .btn-details:active {
            transform: translateY(1px);
            background-color: #2472a4;
            box-shadow: 0 2px 4px rgba(52, 152, 219, 0.2);
        }

        /* Estilo para el enlace de seguir comprando */
        .container p {
            text-align: center;
            margin-top: 20px;
        }

        .container p a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .container p a:hover {
            background-color: #388E3C;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transform: translateY(-1px);
        }

        /* Estilo para el mensaje de cesta vacía */
        #cart-list li:only-child {
            text-align: center;
            color: #666;
            font-size: 1.1em;
            padding: 40px 20px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<?php include __DIR__ . "/header.php"; ?>
    <div class="container">
        <h1>Cesta de Compras</h1>
    <ul id="cart-list">
        <?php if (!empty($cartItems)): ?>
            <?php foreach ($cartItems as $productId): ?>
                <li id="product-<?= htmlspecialchars($productId) ?>">
                    <div class="product-info">
                        <img src="/web/img/productos/default.jpg" alt="Producto" class="product-image">
                        <div class="product-details">
                            <h3 class="product-name">Producto <?= htmlspecialchars($productId) ?></h3>
                            <span class="product-id">ID: <?= htmlspecialchars($productId) ?></span>
                        </div>
                    </div>
                    <div class="actions-container">
                        <a href="index.php?action=Producto&id=<?php echo $productId; ?>" class="btn-details">Ver detalles</a>
                        <button onclick="removeFromCart(<?php echo $productId; ?>)" class="btn-delete" title="Eliminar producto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"/>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                <line x1="10" y1="11" x2="10" y2="17"/>
                                <line x1="14" y1="11" x2="14" y2="17"/>
                            </svg>
                        </button>
                    </div>
                    
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>La cesta está vacía.</li>
        <?php endif; ?>
    </ul>

    <p><a href="index.php">Seguir comprando</a></p> <!-- Ejemplo de enlace para volver a la tienda -->

    <script>
function removeFromCart(productId) {    
    $.ajax({
        type: "POST",
        url: "?action=borrarcarrito",
        data: { "id_producto": productId },
        success: function(data) {
            console.log(data); // Asegúrate de que la respuesta se esté mostrando en la consola
            location.reload();

        },
        error: function(xhr) {
            alert('Error en la solicitud: ' + xhr.status);
        }
    });
}
</script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    </div>
    <?php include __DIR__. "/footer.php"; ?>
</body>
</html>
