<?php
require_once __DIR__. '/../model/conection_BD.php';
require_once __DIR__. '/../model/users.php';


$_SESSION["SesionStart"] = true;
session_destroy();
header('Location: ../index.php');
exit();
?>