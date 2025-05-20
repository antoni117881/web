<style>
        /* Header-specific styles */
        .main-header {
            background-color: #1A202C;
            height: 70px !important;
            min-height: 70px !important;
            max-height: 70px !important;
            display: flex;
            align-items: center;
            width: 100%;
            position: relative;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            width: 100%;
            height: 70px;
            position: relative;
        }

        .header-title {
            height: 70px;
            display: flex;
            align-items: center;
            position: relative;
            margin: 0;
            padding: 0;
        }

        .header-title a {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
            line-height: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
            height: 100%;
        }

        .header-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
        }

        .header-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #fff;
            transition: width 0.3s ease;
        }

        .header-nav a:hover::after {
            width: 100%;
        }

        .header-nav .btn-registro {
            color: #4CAF50;
            font-weight: 600;
        }

        .header-nav .btn-registro::after {
            background-color: #4CAF50;
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            color: #000000 !important;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        button.profile-button {
            color: #000000 !important;
        }

        button.profile-button span {
            color: #000000 !important;
        }

        .profile-button * {
            color: #000000 !important;
        }

        .profile-button:hover {
            background: rgba(255, 255, 255, 1);
            border-color: rgba(0, 0, 0, 0.2);
        }

        .profile-icon,
        .chevron-icon,
        .dropdown-icon {
            font-size: 1.1rem;
            line-height: 1;
        }

        .chevron-icon {
            font-size: 0.8rem;
            transition: transform 0.2s ease;
        }

        .profile-dropdown:hover .chevron-icon {
            transform: rotate(180deg);
            display: inline-block;
        }

        .dropdown-content {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            z-index: 1000;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dropdown-content * {
            color: #000000 !important;
        }

        .profile-dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item,
        .dropdown-item span,
        .dropdown-item * {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #000000 !important;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: #F7FAFC;
        }

        .admin-message {
            color: #64B5F6;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            background-color: rgba(100, 181, 246, 0.15);
            border: 1px solid rgba(100, 181, 246, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-message::before {
            content: '⚡';
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                padding: 1rem;
            }

            .header-nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
                margin-top: 1rem;
            }

            .welcome-message {
                border-right: none;
                padding-right: 0;
                margin-right: 0;
                text-align: center;
                width: 100%;
            }
        }
</style>
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
            <a href="?action=ProductosPag" class="btn-link">Productos</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>
        <?php } else { ?>
            <div class="profile-dropdown">
                <button class="profile-button">
                    <span class="profile-icon">👤</span>
                    <span><?php echo $_SESSION["nameAccount"] ?? "Usuario"; ?></span>
                    <span class="chevron-icon">▼</span>
                </button>
                <div class="dropdown-content">
                    <a href="?action=Profile" class="dropdown-item">
                        <span class="dropdown-icon">👤</span>
                        Mi Perfil
                    </a>
                    <a href="?action=exitLogin" class="dropdown-item">
                        <span class="dropdown-icon">🚪</span>
                        Cerrar Sesión
                    </a>
                </div>
            </div>
            <a href="?action=ProductosPag" class="btn-link">Productos</a>
            <a href="?action=cesta" class="btn-link">Ver Cesta</a>

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
