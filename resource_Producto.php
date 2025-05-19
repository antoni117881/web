<?php 
require_once __DIR__ . '/model/Producto_M.php';

if (!isset($_GET['id'])) {
    header('Location: ?action=Home');
    exit;
}

$id_producto = $_GET['id'];
$productoModel = new ProductoModel();
$producto = $productoModel->obtenerProductoPorId($id_producto);

if (!$producto) {
    header('Location: ?action=Home');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="StylesResource.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f2f2f2;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #e6f0fa; /* Azul claro suave */
        }

        .producto-detalle {
            display: flex;
            width: 100%;
            min-height: calc(100vh - 80px);
            box-sizing: border-box;
            padding: 40px;
            gap: 60px;
            background-color: #dbefff; /* Fondo azul suave */
        }

        .producto-imagen-container {
            flex: 1;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
            border-radius: 15px;
            margin: 10px;
        }

        .producto-imagen {
            max-width: 100%;
            max-height: 75vh;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .producto-imagen:hover {
            transform: scale(1.02);
        }

        .producto-info {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: #1a237e;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            margin: 10px;
        }

        .producto-titulo {
            font-size: 2.5em;
            color: #ffffff;
            margin-top: 5px;
            margin-bottom: 20px;
            border-bottom: 2px solid #ffffff;
            padding-bottom: 10px;
            font-weight: 700;
        }

        .producto-descripcion {
            font-size: 1.1em;
            color: #ecf0f1;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .producto-precio {
            font-size: 2em;
            color: #90caf9;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .producto-detalles {
            background: rgba(255, 255, 255, 0.08);
            padding: 25px;
            margin: 20px 0;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .producto-categoria,
        .producto-stock {
            color: #ecf0f1;
            font-size: 1.1em;
            margin: 8px 0;
            font-weight: 600;
        }

        .btn-agregar {
            width: 100%;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #5cb3ff, #4a90e2);
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1em;
            letter-spacing: 1px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(0, 198, 86, 0.3);
            user-select: none;
        }

        .btn-agregar:hover {
            background: linear-gradient(135deg, #4a90e2, #5cb3ff);
        }

        @media (max-width: 1024px) {
            .producto-detalle {
                flex-direction: column;
            }

            .producto-imagen-container,
            .producto-info {
                padding: 20px;
            }

            .producto-imagen {
                max-height: 50vh;
            }
        }
    </style>
</head>
<body>
<div class="main-container">
    <?php include __DIR__. "/view/header.php"; ?>
    <div class="producto-detalle">
        <div class="producto-imagen-container">
            <img class="producto-imagen" src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
        </div>
        <div class="producto-info">
            <h1 class="producto-titulo"><?php echo htmlspecialchars($producto['nombre']); ?></h1>
            <p class="producto-descripcion"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
            <p class="producto-precio">$<?php echo number_format($producto['precio'], 2); ?></p>
            <div class="producto-detalles">
                <p class="producto-categoria">Categoría: <?php echo htmlspecialchars($producto['categoria']); ?></p>
                <p class="producto-stock">Stock disponible: <?php echo $producto['stock']; ?> unidades</p>
            </div>
            <button class="btn-agregar" onclick="addToCart(<?php echo $producto['id_producto']; ?>)">Agregar al Carrito</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        function addToCart(productId) {
            $.ajax({
                type: "POST",
                url: "?action=carrito",
                data: { "id_producto": productId },
                success: function(data) {
                    alert('Producto agregado al carrito');
                },
                error: function(xhr) {
                    alert('Error al agregar el producto al carrito: ' + xhr.status);
                }
            });
        }
    </script>

    <?php include __DIR__ . "/view/footer.php"; ?>
</div>
</body>
</html>
