<?php

function addUser($conection, $userData) {
    try {
        // Iniciamos una transacción
        $conection->beginTransaction();
        
        $sql = "INSERT INTO usuarios (
                nombre_cuenta, 
                contraseña, 
                nombre, 
                apellido, 
                email, 
                direccion,
                telefono,
                pregunta,
                respuesta
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";
        
        $query = $conection->prepare($sql);
        
        // Bindear los parámetros
        $query->bindParam(1, $userData['nombre_cuenta']);
        $query->bindParam(2, $userData['contraseña']);
        $query->bindParam(3, $userData['nombre']);
        $query->bindParam(4, $userData['apellidos']);
        $query->bindParam(5, $userData['email']);
        $query->bindParam(6, $userData['direccion']);
        $query->bindParam(7, $userData['telefono']);
        $query->bindParam(8, $userData['pregunta']);
        $query->bindParam(9, $userData['respuesta']);
        
        error_log("SQL a ejecutar: " . $sql);
        error_log("Parámetros a usar: " . print_r($userData, true));
        
        $result = $query->execute();
        if (!$result) {
            $error = $query->errorInfo();
            throw new PDOException("Error ejecutando la consulta: " . print_r($error, true));
        }
        
        $conection->commit();
        return true;

    } catch (PDOException $e) {
        // Si hay un error, revierte la transacción
        if ($conection->inTransaction()) {
            $conection->rollBack();
        }
        error_log("Error en addUser: " . $e->getMessage());
        throw $e;
    }
}

function emailExists($conection, $email) {
    try {
        $query = $conection->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $query->execute([':email' => $email]);
        return $query->fetchColumn() > 0;
    } catch (PDOException $e) {
        error_log("Error al verificar email: " . $e->getMessage());
        return false;
    }
}


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
        // Consulta para obtener todos los datos del usuario
        $consult_dataUser = $conection->prepare("SELECT * FROM usuarios WHERE nombre_cuenta = ?");
        $consult_dataUser->bindParam(1, $nameAccount, PDO::PARAM_STR);
        $consult_dataUser->execute();
        $result = $consult_dataUser->fetch(PDO::FETCH_ASSOC);
        
        // Si el usuario no existe
        if (!$result) {
            return false;
        }
        
        // Verificar la contraseña
        if (password_verify($password, $result['contraseña'])) {
            // Guardar datos en la sesión
            $_SESSION['nameAccount'] = $result['nombre_cuenta'];
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['apellido'] = $result['apellido'];
            $_SESSION['id'] = $result['id'];
            
            return $result['rol'];
        } else {
            return false;
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return false;
}


function obtenerUsuarios($conection) {    
    $consulta_usuarios = $conection->prepare("SELECT  * FROM usuarios");
    $consulta_usuarios->execute();
    return $consulta_usuarios->fetchAll(PDO::FETCH_ASSOC);
}

function ReinciarContraseña(
   
    ){
    }


?>
