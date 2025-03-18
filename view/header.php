<div class="header">
    <h2 class="site-title" > <a href="?action=">Super Suela </a></h2>
    <nav class="nav-links">
        <?php 
        $sesion_Start = (!isset ($_SESSION["SesionStart"])) ? null : $_SESSION["SesionStart"];
        if (!isset($sesion_Start) || $sesion_Start === null) {
            $sesion_Start = false;
        } else {
            $sesion_Start = true;
        }

        if ($sesion_Start === false) { 
            echo $sesion_Start
        ?>
            <a href="?action=Registro" class="btn-registro">Registrarse</a>
            <a href="?action=LoginUser" class="btn-link">Login</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>
        <?php } else if( isset($_SESSION['rol']) && $_SESSION['rol'] === "admin" && $sesion_Start===true ) { ?>
            <p class="welcome-message">Bienvenido, <?php echo $_SESSION["nameAccount"]; ?></p>
            <a href="?action=exitLogin" class="btn-link">Salir</a>
            <a href="?action=ProductosGeneral" class="btn-link">Productos</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>
        <?php } ?>
        
        <?php 
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === "admin") { ?>
            <a href="?action=AdminAddProduct" class="btn-link">Añadir Producto</a>
            <p class="admin-message">Eres admin</p>
        <?php } ?>
    </nav>
</div>

<style jsx>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 2rem;
        background-color: #1A202C;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .site-title {
        font-size: 2rem;
        font-weight: 700;
        color: #F7FAFC;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .nav-links a {
        text-decoration: none;
        color:rgb(255, 255, 255);
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .nav-links a:hover {
        background-color: #2B6CB0;
        color: white;
    }

    .btn-registro {
        background-color: #38B2AC;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-registro:hover {
        background-color: #319795;
    }

    .btn-link:hover {
        background-color: transparent;
        color: #3182CE;
    }

    .admin-message {
        color: #F56565;
        font-weight: 600;
        font-size: 1rem;
    }

    .welcome-message {
        font-weight: 600;
        font-size: 1.1rem;
        color: #F7FAFC;
    }
</style>
