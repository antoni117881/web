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
    </head>
    <body>
        <div>
            <h1>PORTADA DE MENU</h1>
        </div>

        <div class="Container-Menu"> 
            <div class="Oferts"> 
                <?php
                    require_once 'controller/Pagina_inicio.php';
                    $conection = DB::getInstance();
                    $productos = ProductosInicio($conection);
                    
                    if ($productos) {
                        foreach ($productos as $producto) {
                            ?>
                            <div class="producto">
                                <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p>Precio: $<?php echo htmlspecialchars($producto['precio']); ?></p>
                                <p>Categoría: <?php echo htmlspecialchars($producto['categoria']); ?></p>
                                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Imagen del producto">
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