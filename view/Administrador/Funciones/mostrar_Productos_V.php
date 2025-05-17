<?php
// Conexión a la base de datos
require_once __DIR__ . '/../../../model/conection_BD.php';

// Obtener la conexión
$db = DB::getInstance();

// Verificar si la conexión es válida
if (!$db) {
    echo "<p style='color: red;'>Error: No se pudo conectar a la base de datos</p>";
    exit;
}

// Consulta para obtener todos los productos
try {
    $query = $db->prepare("SELECT * FROM productos ORDER BY id DESC");
    $result = $query->execute();
    
    // Verificar si la consulta fue exitosa
    if (!$result) {
        echo "<p style='color: red;'>Error en la consulta: " . $db->errorInfo()[2] . "</p>";
        exit;
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Error PDO: " . $e->getMessage() . "</p>";
    exit;
}

// Verificar si hay productos
if ($query->rowCount() > 0) {
    echo "<div class='tabla-productos'>";
    echo "<h2>Lista de Productos</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Precio</th>";
    echo "<th>Stock</th>";
    echo "<th>Categoría</th>";
    echo "<th>Fecha de Creación</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
        echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fecha_creacion']) . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<div class='no-products'>No se encontraron productos</div>";
}
?>

<style>
    .tabla-productos {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .tabla-productos h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .tabla-productos table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .tabla-productos th, .tabla-productos td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .tabla-productos th {
        background-color: #f5f5f5;
    }

    .no-products {
        color: #666;
        margin: 20px 0;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        text-align: center;
    }
</style>    }

    .tabla-productos th,
    .tabla-productos td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .tabla-productos th {
        background-color: #f5f5f5;
        font-weight: 600;
    }

    .tabla-productos tr:hover {
        background-color: #f9f9f9;
    }
</style>
