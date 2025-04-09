<style>
.imagen-producto{
    width: 250px;
    height: 250px;
}
.producto-card{ 
        background:linear-gradient(145deg,rgb(255, 183, 0),rgb(29, 123, 206)) ;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        margin: 10px;
}
.container-cards{
        display: flex;
        flex-direction: row;
    }
   
</style>


<div class="container-cards">
<?php
                require_once __DIR__ . '/../../controller/producto/listarProductos.php';

                if ($productos) {   
                    foreach ($productos as $producto) {
                        ?>
                            <div class="producto-card">
                                <div class="detalles"> 
                                    <h2><?php echo $producto['nombre']; ?></h2>
                                    <img  class="imagen-producto" src="<?php echo $producto['imagen']; ?>" >
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
 </div>
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
<style>
   
   
    .detalles{
        margin:20px;
    }
</style>
   