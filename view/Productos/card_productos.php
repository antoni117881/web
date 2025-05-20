<style>
    .container-cards {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 30px !important;
        max-width: 1400px !important;
        margin: 0 auto !important;
        padding: 20px !important;
        background: transparent !important;
    }

    .container-cards .producto-card {
        background: #ffffff !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        min-height: 500px !important;
        width: 100% !important;
        display: flex !important;
        flex-direction: column !important;
        border: none !important;
    }

    .container-cards .producto-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12) !important;
    }

    .container-cards .imagen-producto {
        width: 100% !important;
        height: 200px !important;
        object-fit: cover !important;
        border-bottom: 1px solid #f1f1f1 !important;
    }

    .container-cards .detalles {
        padding: 16px !important;
        display: flex !important;
        flex-direction: column !important;
        gap: 12px !important;
        flex: 1 !important;
        background: #ffffff !important;
        min-height: 300px !important;
    }

    .container-cards .detalles h2 {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: #1a1a1a !important;
        margin-bottom: 4px !important;
        line-height: 1.4 !important;
    }

    .container-cards .descripcion {
        font-size: 0.9rem !important;
        color: #4b5563 !important;
        line-height: 1.5 !important;
        min-height: 54px !important;
        max-height: 80px !important;
        overflow-y: auto !important;
        padding-right: 4px !important;
        background: transparent !important;
        margin-bottom: 8px !important;
    }

    .container-cards .descripcion::-webkit-scrollbar {
        width: 4px !important;
    }

    .container-cards .descripcion::-webkit-scrollbar-track {
        background: #f1f1f1 !important;
        border-radius: 4px !important;
    }

    .container-cards .descripcion::-webkit-scrollbar-thumb {
        background: #2563eb !important;
        border-radius: 4px !important;
    }

    .container-cards .precio {
        font-size: 1.25rem !important;
        font-weight: 700 !important;
        color: #2563eb !important;
        background: transparent !important;
    }

    .container-cards .categoria {
        font-size: 0.875rem !important;
        color: #6b7280 !important;
        background: #f3f4f6 !important;
        padding: 4px 12px !important;
        border-radius: 20px !important;
        display: inline-block !important;
    }

    .container-cards .id_producto {
        font-size: 0.875rem !important;
        color: #9ca3af !important;
    }

    .container-cards .btn-Login,
    .container-cards .btn-Agregar {
        width: 100% !important;
        padding: 10px !important;
        font-size: 0.9rem !important;
        font-weight: 600 !important;
        border: none !important;
        border-radius: 6px !important;
        text-align: center !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        text-decoration: none !important;
        display: block !important;
        margin-top: 4px !important;
    }

    .container-cards .btn-Login {
        background: #f8fafc !important;
        color: #2563eb !important;
        border: 2px solid #2563eb !important;
    }

    .container-cards .btn-Agregar {
        background: #2563eb !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2) !important;
    }

    .container-cards .btn-Login:hover {
        background: #2563eb !important;
        color: white !important;
    }

    .container-cards .btn-Agregar:hover {
        background: #1d4ed8 !important;
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3) !important;
        transform: translateY(-2px) !important;
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