<?php
require_once __DIR__ . '/../../model/conection_BD.php';
require_once __DIR__ . '/../../model/usuario_M.php';

// Obtener la conexión
$conection = DB::getInstance();

// Obtener los usuarios y guardarlos en una variable que estará disponible para la vista
$usuarios = obtenerUsuarios($conection);

// Si no hay usuarios, inicializar como array vacío para evitar errores
if (!$usuarios) {
    $usuarios = [];
}
