<?php
    require_once __DIR__. '/../../model/usuario_M.php.php';
    require_once __DIR__. '/../../model/conection_BD.php';


    $conection = DB::getInstance();

    $usuarios = obtenerUsuarios($conection);

    // $rutaMenu = __DIR__. '/../resource_Menu.php';
    // if (file_exists($rutaMenu)) {
    //     include $rutaMenu;
    // } else {
    //     die('Error: No se encuentra el archivo resource_Menu.php');
    // }

?>