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

        <div class="header" style="background:grey">
           <strong> HEADER DESDE VIEW/HEADER.PHP </strong>
            <?php
            include __DIR__. "/view/header.php";
            ?>
        </div>
        <div class="Container-Menu"> 
            <h1>PORTADA DE MENU</h1>
            <div class="Oferts" style="display: flex !important; flex-direction: row !important; overflow-x: auto;"> 
            <?php include 'view/view_productos.php'; ?>
            </div>   
        </div>
    </body>
</html>
<?php
    }
?>