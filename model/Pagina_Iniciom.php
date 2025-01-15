<?php
// Funcion para mostrar los productos de inicio
function ProductosInicio($conection)   {    
    $consulta_productos = $conection->prepare("SELECT DISTINCT * FROM productos");
    $consulta_productos->execute();
    $resultados = $consulta_productos->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}
