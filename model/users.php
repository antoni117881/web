<?php


function registrar(
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
) {
    try {
        // Inicia una transacción
        $conection->beginTransaction();

        $consult_dataUser = $conection->prepare(
            "INSERT INTO usuarios (
                nombre_cuenta, 
                contraseña, 
                nombre, 
                apellido, 
                email, 
                direccion,
                telefono,
                pregunta,
                respuesta
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $consult_dataUser->bindParam(1, $nameAccount, PDO::PARAM_STR);
        $consult_dataUser->bindParam(2, $password, PDO::PARAM_STR);
        $consult_dataUser->bindParam(3, $first_name, PDO::PARAM_STR);
        $consult_dataUser->bindParam(4, $last_name, PDO::PARAM_STR);
        $consult_dataUser->bindParam(5, $email, PDO::PARAM_STR);
        $consult_dataUser->bindParam(6, $address, PDO::PARAM_STR);
        $consult_dataUser->bindParam(7, $phone, PDO::PARAM_STR);
        $consult_dataUser->bindParam(8, $question, PDO::PARAM_STR);
        $consult_dataUser->bindParam(9, $response, PDO::PARAM_STR);

        $consult_dataUser->execute();

        // Confirma la transacción
        $conection->commit();

        return true;

    } catch (PDOException $e) {
        // Si hay un error, revierte la transacción
        $conection->rollBack();
        error_log("Error en registro: " . $e->getMessage());
        return false;
    }
}

// funcion de logear 

function login($conection, $nameAccount, $password) {
    try {
        // Consulta para obtener la contraseña y el rol del usuario
        $consult_dataUser = $conection->prepare("SELECT contraseña, rol FROM usuarios WHERE nombre_cuenta = ?");
        $consult_dataUser->bindParam(1, $nameAccount, PDO::PARAM_STR);
        $consult_dataUser->execute();
        $result = $consult_dataUser->fetch(PDO::FETCH_ASSOC); // Solo necesitamos una fila
        // Si el usuario no existe
        if (!$result) {
            return false;
        }
        // Verificar la contraseña
        if (password_verify($password, $result['contraseña'])) {
            $_SESSION["rol"] = $result['rol']; // Asigna el rol a la sesión
            echo "<script>alert('Bienvenido, tu rol es: " . $result['rol'] . "');</script>";
            return $result['rol'];         // Retorna el rol
        } else {
            return false;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return false;
}


function validarLogin(
   
){
}


function ReinciarContraseña(
   
    ){
    }


?>
