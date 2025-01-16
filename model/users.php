<?php

function registrar(
    $conection,
    $nameAccount,
    $password,
    $first_name,
    $last_name,
    $email,
    $address,
    $phone) {

    try {
        // Inicia una transacción
        //$conection->beginTransaction();
        
        $consult_dataUser = $conection->prepare("INSERT INTO usuarios (
        nombre_cuenta, 
        contraseña, 
        nombre, 
        apellido, 
        email, 
        direccion,
        telefono) VALUES (?, ?, ?, ?, ?, ?, ?)");  


        $consult_dataUser->bindParam(1, $nameAccount, PDO::PARAM_STR);
        $consult_dataUser->bindParam(2, $password, PDO::PARAM_STR);
        $consult_dataUser->bindParam(3, $first_name, PDO::PARAM_STR);
        $consult_dataUser->bindParam(4, $last_name, PDO::PARAM_STR);
        $consult_dataUser->bindParam(5, $email, PDO::PARAM_STR);
        $consult_dataUser->bindParam(6, $address, PDO::PARAM_STR);
        $consult_dataUser->bindParam(7, $phone, PDO::PARAM_STR);
        $consult_dataUser->execute();


        // Confirma la transacción
        //$conection->commit();
        return true;
        
    } catch(PDOException $e){

        // Si hay un error, revierte la transacción

       // $conection->rollBack();
       error_log("Error en registro: " . $e->getMessage());
       return false;
    }

   
}


// function login($conection, $usuario, $password) {

//     try {
//         $consulta_graus = $conection->prepare("SELECT password FROM USERS WHERE username = ?");
//         $consulta_graus->bindParam(1, $usuario, PDO::PARAM_STR);
//         $consulta_graus->execute();
//         $resultat_graus = $consulta_graus->fetchAll(PDO::FETCH_ASSOC);

//         if (password_verify($password, $resultat_graus[0]['password'])) {
//             return true;
//         } else {
//             return false;
//         }

//     } catch(PDOException $e){
//         echo "Error: " . $e->getMessage();
//     }

//     return false;
// }





?>