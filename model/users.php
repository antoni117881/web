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

function login(
    $conection,
    $nameAccount,
    $password
){
    try{
        $consult_dataUser =  $conection->prepare("SELECT contraseña FROM usuarios WHERE nombre_cuenta = ?");
        $consult_dataUser->bindParam(1,$nameAccount, PDO::PARAM_STR);
        $consult_dataUser->execute();
        $resultat_graus = $consult_dataUser->fetchAll(PDO::FETCH_ASSOC);


        $nameAccount = $_POST['nameAccount'] ?? null; // Verifica si el índice existe
        if (!$nameAccount) {
            die("Error: El nombre de la cuenta no se proporcionó.");
        }
        
        if (password_verify($password, $resultat_graus[0]['contraseña'])) {
            return true;
        } else {
            return false;
        }
        

    }catch(PDOException $e){
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
