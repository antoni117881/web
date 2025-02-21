<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <link rel="stylesheet" href="StylesResource.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div class="header">
            <?php
            include __DIR__. "/view/header.php";
            ?>
        </div>
        <div class="Container-Menu"> 
            <h1>NUESTROS PRODUCTOS</h1>
            <div class="Oferts" style="display: flex !important; flex-direction: row !important; overflow-x: auto;"> 
            <?php include 'view/view_productos.php'; ?>
            </div>   
        </div>
    </body>
</html>
