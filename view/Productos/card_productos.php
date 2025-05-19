<style>
    .container-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    .producto-card {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 450px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .producto-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .imagen-producto {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #f1f1f1;
    }

    .detalles {
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: calc(100% - 200px);
    }

    .detalles h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 4px;
        line-height: 1.4;
    }

    .descripcion {
        font-size: 0.9rem;
        color: #4b5563;
        line-height: 1.5;
        height: 54px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .descripcion::-webkit-scrollbar {
        width: 4px;
    }

    .descripcion::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .descripcion::-webkit-scrollbar-thumb {
        background: #2563eb;
        border-radius: 4px;
    }

    .precio {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2563eb;
    }

    .categoria {
        font-size: 0.875rem;
        color: #6b7280;
        background: #f3f4f6;
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-block;
    }

    .id_producto {
        font-size: 0.875rem;
        color: #9ca3af;
    }

    .btn-Login,
    .btn-Agregar {
        width: 100%;
        padding: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        margin-top: 4px;
    }

    .btn-Login {
        background: #f8fafc;
        color: #2563eb;
        border: 2px solid #2563eb;
    }

    .btn-Agregar {
        background: #2563eb;
        color: white;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    .btn-Login:hover {
        background: #2563eb;
        color: white;
    }

    .btn-Agregar:hover {
        background: #1d4ed8;
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        transform: translateY(-2px);
    }
</style>


<div class="container-cards">
<?php
                require_once __DIR__ . '/../../controller/producto/listarProductos.php';

                if ($productos) {   
                    foreach ($productos as $producto) {
                        ?>
                            <div class="producto-card">
                                    <img class="imagen-producto" src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                                <div class="detalles"> 
                                    <h2><?php echo $producto['nombre']; ?></h2>
                                    <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
                                    <p class="categoria"><?php echo $producto['categoria']; ?></p>
                                    <p class="precio">$<?php echo number_format($producto['precio'], 2); ?></p>
                                    <a href="?action=Producto&id=<?php echo $producto['id_producto']; ?>" class="btn-Login">Ver detalles</a>
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