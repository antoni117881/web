<?php


require_once __DIR__ . '/../../model/usuario_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

$mensajeError = [];

// Validar campos y guardar datos de usuario
if (empty($_POST['nameAccount'])) {
    $mensajeError[] = "El campo Nombre de Usuario no puede estar vacío.";
} elseif (strlen($_POST['nameAccount']) < 4 || strlen($_POST['nameAccount']) > 12) {
    $mensajeError[] = "El nombre de la cuenta debe tener entre 4 y 12 caracteres.";
} else {
    $_SESSION['nameAccount'] = $_POST['nameAccount'];
}

if (empty($_POST['password'])) {
    $mensajeError[] = "El campo Contraseña no puede estar vacío.";
} elseif (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 12) {
    $mensajeError[] = "La contraseña debe tener entre 8 y 16 caracteres.";
} else {
    $_SESSION['password'] = $_POST['password'];
}

if (empty($_POST['last_name'])) {
    $mensajeError[] = "El campo Apellido no puede estar vacío.";
} elseif (strlen($_POST['last_name']) < 4 || strlen($_POST['last_name']) > 12) {
    $mensajeError[] = "El apellido debe tener entre 4 y 12 caracteres.";
} else {
    $_SESSION['last_name'] = $_POST['last_name'];
}

if (empty($_POST['first_name'])) {
    $mensajeError[] = "El campo Nombre no puede estar vacío.";
} elseif (strlen($_POST['first_name']) < 4 || strlen($_POST['first_name']) > 12) {
    $mensajeError[] = "El nombre debe tener entre 4 y 12 caracteres.";
} else {
    $_SESSION['first_name'] = $_POST['first_name'];
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $mensajeError[] = "El correo electronico debe tener un formato valido: Ejemplo..@gmail.com";
} else {
    $_SESSION['email'] = $_POST['email'];
}

if (strlen($_POST['address']) < 8 || strlen($_POST['address']) > 16) {
    $mensajeError[] = "La direccion debe tener entre 8 y 16 caracteres.";
} else {
    $_SESSION['address'] = $_POST['address'];
}

if (empty($_POST['phone'])) {
    $mensajeError[] = "El campo Número Móvil no puede estar vacío.";
} elseif (strlen($_POST['phone']) !== 9 ) {
    $mensajeError[] = "El número de teléfono debe tener exactamente 9 dígitos.";
} else {
    $_SESSION['phone'] = $_POST['phone'];
}

if (empty($_POST['questionList'])) {
    $mensajeError[] = "Tiene que elegir una pregunta";
}else {
    $_SESSION['questionList'] = $_POST['questionList'];
}

if (empty($_POST['response'])) {
    $mensajeError[] = "Tienes que rellenar el campo de Respuesta";
} elseif (strlen($_POST['response']) > 8 ) {
    $mensajeError[] = "Solo puede introducir 8 caracteres";
} else {
    $_SESSION['response'] = $_POST['response'];
}



// Mnadar erores encontrado a la view
if (!empty($mensajeError)) {

    $_SESSION['errores'] = $mensajeError; 
    include __DIR__ . '/../../view/Mensajes/error_Registro.php'; // Mostrar la vista de errores
    exit();
}


$password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

$nameAccount = $_SESSION['nameAccount'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];
$question = $_SESSION['questionList'];
$response = $_SESSION['response'];

$conection = DB::getInstance();

$registre = registrar(
    $conection, 
    $nameAccount, 
    $password, 
    $first_name, 
    $last_name,
    $email, 
    $address, 
    $phone,
    $question,
    $response
);


if ($registre) {
    $confirmacionRegistre ="Registrado correctamente";
    $_SESSION['ValidatedRegistre'] = $confirmacionRegistre;
    // include __DIR__.'/resource_Menu.php';
    include __DIR__ . '/../../resource_Menu.php';  
}



?>
