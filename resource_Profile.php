<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['nameAccount'])) {
    header("Location: index.php?action=LoginUser");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="/web/css/common.css">
    <style>
        body {
            background-color: white;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .profile-page {
            flex: 1;
            width: 100%;
        }

        .profile-header {
            background: #f8f9fa;
            padding: 3rem 0;
            margin-bottom: 3rem;
            border-bottom: 1px solid #e9ecef;
        }

        .profile-header-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 3rem;
            align-items: center;
        }

        .profile-image-container {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            background: #edf2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .profile-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-image-placeholder {
            font-size: 4rem;
            color: #a0aec0;
        }

        .upload-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 0.5rem;
            font-size: 0.875rem;
            text-align: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .profile-image-container:hover .upload-overlay {
            opacity: 1;
        }

        .profile-info h1 {
            color: #2D3748;
            font-size: 2.5rem;
            margin: 0 0 0.5rem 0;
            font-weight: bold;
        }

        .profile-info p {
            color: #718096;
            font-size: 1.1rem;
            margin: 0;
        }

        .profile-data {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .data-section {
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 1.5rem;
            color: #2D3748;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e9ecef;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
        }

        .data-section:last-child {
            border-bottom: none;
        }

        .data-group {
            margin-bottom: 2rem;
        }

        .data-label {
            font-size: 0.875rem;
            color: #718096;
            display: block;
            margin-bottom: 0.5rem;
        }

        .data-value {
            font-size: 1.25rem;
            color: #2D3748;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        @media (max-width: 768px) {
            .profile-header-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1.5rem;
            }

            .profile-image-container {
                margin: 0 auto;
            }

            .data-section {
                grid-template-columns: 1fr;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . "/view/header.php"; ?>

    <div class="profile-page">
        <div class="profile-header">
            <div class="profile-header-content">
                <div class="profile-image-container">
                    <div class="profile-image-placeholder">👤</div>
                    <div class="upload-overlay">
                        Cambiar foto
                    </div>
                </div>
                <div class="profile-info">
                    <h1><?php echo htmlspecialchars($_SESSION['nameAccount'] ?? 'Usuario'); ?></h1>
                    <p><?php echo htmlspecialchars($_SESSION['rol'] ?? 'Cliente'); ?></p>
                </div>
            </div>
        </div>

        <div class="profile-data">
            <div class="data-section">
                <h2 class="section-title">Información de la cuenta</h2>
                <div class="data-grid">
                    <div class="data-group">
                        <span class="data-label">Nombre de usuario</span>
                        <div class="data-value"><?php echo htmlspecialchars($_SESSION['nameAccount'] ?? 'No disponible'); ?></div>
                    </div>
                    <div class="data-group">
                        <span class="data-label">Correo electrónico</span>
                        <div class="data-value"><?php echo htmlspecialchars($_SESSION['email'] ?? 'No disponible'); ?></div>
                    </div>
                </div>
            </div>

            <div class="data-section">
                <h2 class="section-title">Datos personales</h2>
                <div class="data-grid">
                    <div class="data-group">
                        <span class="data-label">Nombre</span>
                        <div class="data-value"><?php echo htmlspecialchars($_SESSION['nombre'] ?? 'No disponible'); ?></div>
                    </div>
                    <div class="data-group">
                        <span class="data-label">Apellidos</span>
                        <div class="data-value"><?php echo htmlspecialchars($_SESSION['apellido'] ?? 'No disponible'); ?></div>
                    </div>
                </div>
            </div>

            <div class="data-section">
                <h2 class="section-title">Detalles de la cuenta</h2>
                <div class="data-grid">
                    <div class="data-group">
                        <span class="data-label">Tipo de cuenta</span>
                        <div class="data-value"><?php echo htmlspecialchars($_SESSION['rol'] ?? 'Cliente'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/view/footer.php"; ?>
</body>
</html>
