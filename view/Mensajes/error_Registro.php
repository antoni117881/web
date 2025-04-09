
<!DOCTYPE html>
<html>
    <head>
        <title>Error en Registro</title>
    </head>
    <body>
        <div>
            <h1>Verifica tus datos</h1>
            <h3>Errores encontrados</h3>
            <?php
            if(isset($_SESSION['errores'])) {
                foreach($_SESSION['errores'] as $error):?>
                   <li><?php echo htmlspecialchars($error)?></li>
            <?php  
                endforeach;
            }
            ?>
        </div>
    </body>
</html>