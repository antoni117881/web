    <?php
                    require_once 'controller/porducts.php';
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
    fetch('?action=carrito', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}`
    })
    .then(response => response)
    .then(data => {
        console.log(data)
        if (data.status === 'success') {
            const cartList = document.getElementById('cart-list');
            const newItem = document.createElement('li');
            newItem.textContent = `Producto ID: ${productId}`;
            cartList.appendChild(newItem);
        } else {
            alert('se ha agregao correctamente .');
        }
    })
    .catch((err) => alert(err + 'Error en la conexión con el servidor.'));
}

</script>