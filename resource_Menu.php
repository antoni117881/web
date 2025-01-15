<?php
    // Asegurarnos de que el archivo solo se incluye una vez
    if (!defined('INCLUDED')) {
        define('INCLUDED', true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SuperSuela Menu</title>
        <link rel="stylesheet" href="StylesResource.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="Container-Menu"> 
            <h1>PORTADA DE MENU</h1>
            <div class="Oferts" style="display: flex !important; flex-direction: row !important; overflow-x: auto;"> 
                <?php
                require_once 'controller/Pagina_inicio.php';
                $conection = DB::getInstance();
                $productos = ProductosInicio($conection);
                
                if ($productos) {
                    foreach ($productos as $producto) {
                        ?>
                        <div class="producto-card" style="min-width: 300px; flex: 0 0 auto;">
                            <div class="producto-content">
                                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="precio">Precio: $<?php echo htmlspecialchars($producto['precio']); ?></p>
                                <p class="categoria">Categoría: <?php echo htmlspecialchars($producto['categoria']); ?></p>
                                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Imagen del producto">
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>   
        </div>
    </body>
</html>
<?php
    }
?>