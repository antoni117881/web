
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="../view/View_Css/Registre.css">
    <style>
     .Container-Menu {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         margin-top: 50px;
     }
     .Container-Registre {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         margin-top: 50px;
         background:linear-gradient(145deg,rgb(255, 183, 0),rgb(29, 123, 206)) ;
     }
     .Form_Registre {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         margin: 30px;
     }
     .body{
        background: linear-gradient(90deg,rgb(82, 78, 215),rgb(71, 114, 232), #86a8e7);
                animation: moveGradient 5s ease-in-out infinite alternate;
     }
</style>
</head>
<body class=" body">
    <?php 
        include __DIR__ . '/view/Registro/registro_pag.php';
    ?>

</body>
</html>
