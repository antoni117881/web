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
        <div class="">
            <?php
            include __DIR__. "/view/header.php";
            ?>
        </div>
        <div class="Container-Menu"> 
            <h1>Productos en Oferta</h1>
            
            <div class="Oferts" > 
            <?php include 'view/view_productos.php'; ?>
            </div>   
        </div>
    </body>
</html>
<?php
    }
?>