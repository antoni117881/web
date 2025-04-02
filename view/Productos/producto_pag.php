<?php
 //! Aqui recuperar Prodcuto por Id con el controlador 
 //todo: en el boton de ir a producto en el menu de productos EJECUTARA FUNCION  obtenerPorID
?>
<div class="container-producto">
        <?php if (!$resultado['error']): ?>
            <?php $producto = $resultado['producto']; ?>
            <div class="producto-detalle">
                <h1><?php echo htmlspecialchars($producto['nombre']); ?></h1>
                <div class="producto-info">
                    <img src="imagenes/<?php echo htmlspecialchars($producto['imagen']); ?>" 
                         alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                         class="producto-imagen-grande">
                    <div class="detalles">
                        <p class="descripcion"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                        <p class="precio">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <p class="categoria">Categoría: <?php echo htmlspecialchars($producto['categoria']); ?></p>
                        <p class="id-producto">ID: <?php echo htmlspecialchars($producto['id_producto']); ?></p>
                        
                        <!-- Botón para volver al menú -->
                        <a href="?action=" class="btn-volver">Volver al Menú</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="error-container">
                <h2>Error</h2>
                <p><?php echo $resultado['mensaje']; ?></p>
                <a href="?action=" class="btn-volver">Volver al Menú</a>
            </div>
        <?php endif; ?>
    </div>