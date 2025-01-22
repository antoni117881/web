<html>
    
    <body>
    <div>
    
    
      

    <?php 
    if (!isset($sesion_ok)) {
        $sesion_ok = false; // si no inicia session sera falso
    }
    if ($sesion_ok === true ) { //si ha entrado en session muestra:?> 
    <a href="?action=Registro" class="btn-registro">Registrarse</a>
    <a href="?action=LoginUser" class="btn-Login">Login</a>
    <?php } else { ?>
        <p>HAS ENTRADO EN TU SESIÓN: <?php echo $_SESSION["nameAccount"]; ?></p>
        <button action="?action=reset_password" class="btn">Salir de session</button>
        
    <?php } ?>

    </div>
    </body>

    
</html>