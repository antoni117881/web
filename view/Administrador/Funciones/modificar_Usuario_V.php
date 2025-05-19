<?php
require_once __DIR__ . '/../../../model/usuario_M.php';
require_once __DIR__ . '/../../../model/conection_BD.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <?php include __DIR__ . '/../../header.php'; ?>
    <style>
    .page-container {
        position: relative;
        width: 100%;
        padding-top: 30px;
    }

    .btn-back {
        position: absolute;
        top: 30px;
        right: 30px;
        padding: 12px 24px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
        z-index: 1000;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .btn-back svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }

    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        color: #1a237e;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: 500;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #1a237e;
        outline: none;
        box-shadow: 0 0 5px rgba(26,35,126,0.2);
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn-guardar,
    .btn-cancelar {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .btn-guardar {
        background: #4CAF50;
        color: white;
    }

    .btn-cancelar {
        background: #f44336;
        color: white;
    }

    .btn-guardar:hover {
        background: #45a049;
    }

    .btn-cancelar:hover {
        background: #da190b;
    }
    </style>
</head>
<body>
<div class="page-container">
    <a href="?action=PanelAdmin" class="btn-back">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
        Volver
    </a>
    <?php

    if (isset($_GET['id'])) {
        $id_usuario = $_GET['id'];
    $db = DB::getInstance();
    
    // Consultar el usuario
    $query = $db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
    $query->bindParam(':id', $id_usuario);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="form-container">
    <h2>Modificar Usuario</h2>
    <form id="modificarUsuarioForm" method="POST" action="controller/Usuario/modificarUsuario.php">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
        
        <div class="form-group">
            <label for="nombre_cuenta">Nombre de Cuenta:</label>
            <input type="text" id="nombre_cuenta" name="nombre_cuenta" value="<?php echo htmlspecialchars($usuario['nombre_cuenta']); ?>" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="usuario" <?php echo $usuario['rol'] == 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : ''; ?>>Administrador</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-guardar">Guardar Cambios</button>
            <button type="button" class="btn-cancelar" onclick="document.getElementById('cancelForm').submit();">Cancelar</button>
            <form id="cancelForm" action="index.php?action=PanelAdmin" method="POST">
                <input type="hidden" name="adminAction" value="ver_usuarios">
            </form>
        </div>
    </form>
</div>
</div>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
