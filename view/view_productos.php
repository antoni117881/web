<?php
                require_once 'controller/productos_C.php';
                require_once 'controller/Pagina_inicio.php';
                
                
                
                if ($productos) {   
                    foreach ($productos as $producto) {
                        ?>
                        <div class="producto-card">
                            <div class="producto-content">
                                <h2><?php echo $producto['nombre']; ?></h2>
                                <p class="imagen-producto"><?php echo $producto['imagen']; ?></p>
                                <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                                <p class="precio">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                                <p class="categoria">Categoría: <?php echo $producto['categoria']; ?></p>
                                <p class="id_producto">Id Producto: <?php echo $producto['id_producto']; ?></p>
                                <a href="?action=Producto&id=<?php echo $producto['id_producto']; ?>" class="btn-Login">Ir a Producto : <?php echo $producto['id_producto']; ?></a>
                                <button onclick="addToCart(<?php echo $producto['id_producto']; ?>)" class="btn-Agregar">Agregar a la Cesta</button>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
<script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/cesta.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var data =(xhr.responseText); // Asegúrate de parsear la respuesta
                if (data && data.success) {
                    alert('Producto añadido a la cesta');
                } else {
                    alert('Error al añadir el producto: ' + (data.message || 'Error desconocido'));
                }
            } else {
                alert('Error en la solicitud: ' + xhr.status);
            }
        }
    };

    var body = JSON.stringify({ id_producto: productId });
    xhr.send(body);
}
</script>