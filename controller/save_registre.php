<?php
// session_start();
// Conectar datos de bbbd y users
 require_once __DIR__ . '/../model/users.php';
 require_once __DIR__ . '/../model/conection_BD.php';

 /*
 $mensajeError = [];

 $controlErrors = [
     'errorPassw' => (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 16) 
         && $mensajeError[] = "La contraseña debe tener entre 8 y 16 caracteres.", 
 
     'errorAccount' => ( strlen($_POST['nameAccount']) < 8 || strlen($_POST['nameAccount']) > 12)
         && $mensajeError[] = "El nombre de la cuenta debe tener entre 8 y 12 caracteres.",
       
     'errorLastName' => ( strlen($_POST['last_name']) < 8 || strlen($_POST['last_name']) > 12)
         && $mensajeError[] = "El apellido debe tener entre 8 y 12 caracteres.",
       
     'errorFirstName' => ( strlen($_POST['first_name']) < 8 || strlen($_POST['first_name']) > 12)
         && $mensajeError[] = "El nombre debe tener entre 8 y 12 caracteres.",
       
     'errorEmail' => ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
         && $mensajeError[] = "El correo electrónico es obligatorio y debe tener un formato válido.",
        
     'errorAddress' => ( strlen($_POST['address']) < 8 || strlen($_POST['address']) > 10)
         && $mensajeError[] = "La dirección debe tener entre 8 y 10 caracteres.",
       
     'errorPhone' => ( strlen($_POST['phone']) != 10)
         && $mensajeError[] = "El número de teléfono debe tener exactamente 10 caracteres."
 ];
 */



    
 if(!empty($_POST['nameAccount'])
 && !empty($_POST['password']) 
 && !empty($_POST['last_name']) 
 && !empty($_POST['first_name'])
 && !empty($_POST['email'])
 && !empty($_POST['address'])
 && !empty($_POST['phone'])
 ){
        
        $_SESSION['nameAccount'] = $_POST['nameAccount'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['phone'] = $_POST['phone'];

        $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

        $nameAccount = $_SESSION['nameAccount'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $phone = $_SESSION['phone'];

        $conection = DB::getInstance();

        $registre = registrar(
            $conection, 
            $nameAccount, 
            $password, 
            $first_name, 
            $last_name,
            $email, 
            $address, 
            $phone);

            // MOSTRAR ERRORES
            /*
            if(!empty($mensajeError)) {  // o también: if(count($mensajeError) > 0)
                foreach($mensajeError as $error) {
                    echo $error . "<br>";
                }
            }*/

        if ($registre) {
            include __DIR__ . '/../view/registreCompleted.php';
            echo "Registrado correctamente",
            $registre ;
        } else {
            include __DIR__ . '/../view/login_error.php';
        }
    }else {
        echo "Los campos no pueden estar vacios ";
    }
        
       
            
        
            

            
?>