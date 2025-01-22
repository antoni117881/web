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
            <a href="resource_Register.php" class="btn-registro">Registrarse</a>
            <a href="resource_LoginSession.php" class="btn-Login">Login</a>
            <div class="Oferts" style="display: flex !important; flex-direction: row !important; overflow-x: auto;"> 
                <?php
                
                require_once 'controller/porducts.php';
                require_once 'controller/Pagina_inicio.php';
                $conection = DB::getInstance();
                $productos = ProductosInicio($conection);
                
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
                                <a href="resource_ProductView.php?id=<?php echo $producto['id_producto']; ?>" class="btn-Login">Ir a Producto : <?php echo $producto['id_producto']; ?></a>
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