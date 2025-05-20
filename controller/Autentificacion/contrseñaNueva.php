<?php
require_once __DIR__ . '/../../model/usuario_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'Resetcontraseña') {
    $email = $_POST['email'] ?? '';
    $nuevaContraseña = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Validaciones básicas
    if (empty($email) || empty($nuevaContraseña) || empty($confirmPassword)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
        exit;
    }

    if ($nuevaContraseña !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.history.back();</script>";
        exit;
    }

    $db = DB::getInstance();
    $hola = $_POST['newPassword'] ;
    $result = reiniciarContraseña($db, $email, $nuevaContraseña);
   
  
}
