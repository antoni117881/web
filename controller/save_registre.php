<?php
// Conectar datos de bbbd y users
 require_once __DIR__ . '/../model/users.php';
 require_once __DIR__ . '/../model/conection_BD.php';



        if (isset($_POST['nameAccount']) &&
        isset($_POST['password']) &&
        isset($_POST['first_name']) &&
        isset($_POST['last_name']) &&
        isset($_POST['email']&&
        isset($_POST['address']) &&
        isset($_POST['phone']) 
        )
        ) {
            $_SESSION['nameAccount'] = $_POST['nameAccount'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['last_name'] = $_POST['last_name'];
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['phone'] = $_POST['phone'];
            

            // Pasword hasheada
            $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

            // Utilizar instancia para crear datos en la BD 
            $conection = DB::getInstance();
            $registre = registrar($conection, $_SESSION['nameAccount'], $password);
        }else {
            $mensaje = "Error en el registro, faltan campos.";
        }

        include __DIR__ . '/../view/registreCompleted.php';
            
            

            
?>