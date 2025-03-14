<html>
    
    <body>
    <div>
    
    <?php 

    if (!isset($sesion_ok) || $sesion_ok === null) { // si no ha iniciado session sera nulo
        $sesion_ok = false; // si no inicia session sera falso
    } else {
        $sesion_ok = true;
    }
    if ($sesion_ok === false ) { //si ha entrado en session muestra:?> 
    <a href="?action=Registro" class="btn-registro">Registrarse</a>
    <a href="?action=LoginUser" class="btn-Login">Login</a>
    <a href="resource_cesta.php" class="btn">Ver Cesta</a>
    
    <?php } else { ?>
        <p>HAS ENTRADO EN TU SESIÓN: <?php echo $_SESSION["nameAccount"]; ?></p>
        <button action="?action=exitLogin" class="btn">Salir de session</button>
        <a href="?action=exitLogin" class="btn">Salir de session</a>
        <a href="?action=ProductosGeneral" class="btn">Productos</a>
        <a href="resource_cesta.php" class="btn">Ver Cesta</a>
    <?php } ?>
    <div>
        <?php 
        if ($_SESSION['rol'] === "admin") { ?>

            <a href="?action=AdminAddProduct" class="btn">Añadir Producto</a>
        <?php  echo "Eres admin"; }
        
        ?>
    </div>
    

    </div>
    </body>

    
</html>