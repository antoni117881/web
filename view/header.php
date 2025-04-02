
<div class="header">
    <h2 class="site-title">
        <a href="?action=home">Super Suela</a>
    </h2>
    <nav class="nav-links">
        <?php 
        $sesion_Start = $_SESSION["SesionStart"] ?? null;
        
        if (!isset($_SESSION['rol']) && $sesion_Start === null) {
            
            $sesion_Start = false;
        } else {
            $sesion_Start = true;
        }

        if ($sesion_Start === false) { ?>
            <a href="?action=Registro" class="btn-registro">Registrarse</a>
            <a href="?action=LoginUser" class="btn-link">Login</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>
        <?php } else { ?>
            <p class="welcome-message">Bienvenido, <?php echo $_SESSION["nameAccount"] ?? "Usuario"; ?></p>
            <a href="?action=exitLogin" class="btn-link">Salir</a>
            <a href="?action=ProductosPag" class="btn-link">Productos</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>
            <a href="?action="> Pruebas </a>

            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === "admin") { ?>
                <a href="?action=PanelAdmin" class="btn-link">Panel de Administrador</a>
                <p class="admin-message">Eres admin</p>
            <?php } else{ ?>
                <p class="admin-message">Eres Cliente</p>
                <?php } ?>

        <?php } ?>
    </nav>
</div>

<style>
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
        background-color: #2B6CB0;
        color: rgb(255, 255, 255);
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .nav-links a:hover {
        background-color:rgb(135, 185, 239);
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
