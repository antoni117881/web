<html>
    <head></head>
<body>
    <div>
        <h1>Verifica tus datos </h1>
        <h3>Errores encontrados</h3>
        <?php
            foreach($_SESSION['errores'] as $error):?>
               <li><?php echo($error)?> </li>
        <?php  endforeach; ?>
        
    </div>
</body>

</html>