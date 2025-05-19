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
        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .profile-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
        }

        .profile-header h1 {
            color: #2D3748;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .profile-data {
            display: grid;
            gap: 1.5rem;
        }

        .data-group {
            display: grid;
            gap: 0.5rem;
        }

        .data-label {
            font-weight: 600;
            color: #4A5568;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-value {
            font-size: 1.1rem;
            color: #2D3748;
            padding: 0.5rem;
            background: #F7FAFC;
            border-radius: 6px;
            border: 1px solid #E2E8F0;
        }

        @media (max-width: 768px) {
            .profile-container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . "/view/header.php"; ?>

    <div class="profile-container">
        <div class="profile-header">
            <h1>Mi Perfil</h1>
            <p>Gestiona tu información personal</p>
        </div>

        <div class="profile-data">
            <div class="data-group">
                <span class="data-label">Nombre</span>
                <div class="data-value"><?php echo htmlspecialchars($_SESSION['nameAccount'] ?? 'No disponible'); ?></div>
            </div>

            <div class="data-group">
                <span class="data-label">Email</span>
                <div class="data-value"><?php echo htmlspecialchars($_SESSION['email'] ?? 'No disponible'); ?></div>
            </div>

            <div class="data-group">
                <span class="data-label">Tipo de cuenta</span>
                <div class="data-value"><?php echo htmlspecialchars($_SESSION['rol'] ?? 'Cliente'); ?></div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/view/footer.php"; ?>
</body>
</html>
