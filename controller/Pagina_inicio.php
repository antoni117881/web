<?php
require_once __DIR__. '/../model/Pagina_Iniciom.php';
require_once __DIR__. '/../model/conection_BD.php';

$conection = DB::getInstance();

$productos = ProductosInicio($conection);

$rutaMenu = __DIR__ . '/../resource_Menu.php';
if (file_exists($rutaMenu)) {
    include $rutaMenu;
} else {
    die('Error: No se encuentra el archivo resource_Menu.php');
}

