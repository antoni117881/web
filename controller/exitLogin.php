<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirige al login
include __DIR__ . '/../resource_Menu.php';
exit();
?>