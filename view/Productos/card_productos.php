<style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f0f2f5;
        padding: 20px;
    }

    .container-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .producto-card {
        background-color: #1e1e2f;
        color: #f1f1f1;
        width: 260px;
        height: 460px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 16px;
    }

    .producto-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .imagen-producto {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 12px;
    }

    .detalles {
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .detalles h2 {
        font-size: 16px;
        margin-bottom: 8px;
        color: #ffffff;
    }

    .descripcion,
    .precio,
    .categoria,
    .id_producto {
        font-size: 14px;
        margin: 2px 0;
        color: #cccccc;
    }

    .btn-Login,
    .btn-Agregar {
        margin: 6px 4px 0;
        padding: 10px;
        font-size: 14px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        color: white;
        cursor: pointer;
        transition: background 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-Login:hover,
    .btn-Agregar:hover {
        background: linear-gradient(135deg, #0072ff, #00c6ff);
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
    $.ajax({
        type: "POST",
        url: "?action=carrito",
        data: { "id_producto": productId },
        success: function(data) {
            console.log(data); // Asegúrate de que la respuesta se esté mostrando en la consola
          
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
<style>
   
   
    .detalles{
        margin:20px;
    }
</style>
   