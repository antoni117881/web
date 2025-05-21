<?php include __DIR__. "/view/header.php"; ?>
<style>
    body {
        background: #f8fafc;
    }
    .reset-container {
        max-width: 400px;
        margin: 40px auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        padding: 40px 32px 32px 32px;
        text-align: center;
    }
    .reset-container h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 24px;
    }
    .reset-container label {
        display: block;
        text-align: left;
        font-weight: 600;
        margin-bottom: 6px;
        margin-top: 18px;
    }
    .reset-container input[type="email"],
    .reset-container input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 6px;
        font-size: 1rem;
        outline: none;
        transition: border 0.2s;
    }
    .reset-container input:focus {
        border: 1.5px solid #4f5bd5;
    }
    .reset-container button {
        width: 100%;
        background: linear-gradient(90deg, #4f5bd5 0%, #5a6ff0 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 12px 0;
        font-size: 1.1rem;
        font-weight: 500;
        margin-top: 18px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .reset-container button:hover {
        background: linear-gradient(90deg, #5a6ff0 0%, #4f5bd5 100%);
    }
</style>
<div class="reset-container">
    <h2>Restablecer contraseña</h2>
    <form method="POST" action="?action=Resetcontraseña">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" required>

        <label for="newPassword">Nueva contraseña:</label>
        <input type="password" name="newPassword" required>

        <label for="confirmPassword">Confirmar contraseña:</label>
        <input type="password" name="confirmPassword" required>

        <button type="submit">Restablecer contraseña</button>
    </form>
</div>
