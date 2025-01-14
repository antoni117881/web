<?php

function registrar($conection, $usuario, $password) {

    try {
        // Inicia una transacción
        //$conection->beginTransaction();

        $consult_dataUser = $conection->prepare("INSERT INTO usuarios (nameAccount, password) VALUES (?, ?)");
        $consult_dataUser->bindValue(1, $usuario, PDO::PARAM_STR);
        $consult_dataUser->bindValue(2, $password, PDO::PARAM_STR);
        $consult_dataUser->execute();


        // Confirma la transacción
        //$conection->commit();

        return true;
    } catch(PDOException $e){

        // Si hay un error, revierte la transacción
        $conection->rollBack();
        echo "Error: " . $e->getMessage();
    }

    return false;
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