<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web/css/common.css">
    <style>
        /* Header-specific styles */
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1.5rem;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-nav a {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #2D3748;
            color: #F7FAFC;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .header-nav a:hover {
            background-color: #4A5568;
            transform: translateY(-1px);
        }

        .header-nav .btn-registro {
            background-color: #3182CE;
        }

        .header-nav .btn-registro:hover {
            background-color: #2B6CB0;
        }

        .header-nav .welcome-message,
        .header-nav .admin-message {
            color: #A0AEC0;
            font-size: 0.9rem;
            margin: 0;
            padding: 0.5rem 0;
        }

        .header-nav .admin-message {
            color: #F56565;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .header-nav {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<div class="main-header">
    <div class="header-content">
        <h2 class="header-title">
            <a href="?action=Home">Super Suela</a>
        </h2>
        <nav class="header-nav">
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
</div>
</body>
</html>
