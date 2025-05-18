<?php
require_once __DIR__ . '/../../../controller/producto/listarProductos.php';
?>


    <style>
    .container-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .producto-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .producto-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .detalles {
        padding: 20px;
    }

    .detalles h2 {
        margin: 0 0 10px 0;
        color: #333;
        font-size: 1.5rem;
    }

    .descripcion {
        color: #666;
        margin: 10px 0;
        line-height: 1.4;
    }

    .precio {
        color: #2563eb;
        font-weight: bold;
        font-size: 1.2rem;
        margin: 10px 0;
    }

    .categoria {
        background: #f3f4f6;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
        color: #4b5563;
        margin: 5px 0;
    }

    .id_producto {
        color: #6b7280;
        font-size: 0.9rem;
        margin: 5px 0;
    }
    .btn-modificar {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        margin-top: 10px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .btn-modificar:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }
    </style>


<div class="container-cards">
<?php
if ($productos) {   
    foreach ($productos as $producto) {
        ?>
        <div class="producto-card">
            <div class="detalles"> 
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <p class="descripcion"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p class="precio">Precio: €<?php echo number_format($producto['precio'], 2); ?></p>
                <p class="categoria">Categoría: <?php echo htmlspecialchars($producto['categoria']); ?></p>
                <p class="id_producto">Stock: <?php echo htmlspecialchars($producto['stock']); ?></p>
                <button onclick="modificarProducto(<?php echo $producto['id_producto']; ?>)" class="btn-modificar">Modificar Producto</button>
            </div>                        
        </div>
        <?php
    }
} else {
    echo '<div style="text-align: center; padding: 20px;">No hay productos disponibles</div>';
}
?>
</div>

<script>
function modificarProducto(id) {
    window.location.href = '?action=ModificarProducto&id=' + id;
}
</script>
