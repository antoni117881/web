<?php
require_once __DIR__ . '/../../../model/Producto_M.php';
require_once __DIR__ . '/../../../model/conection_BD.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="/web/css/common.css">
    <style>
    .form-container {
        max-width: 600px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-title {
        color: #1f2937;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        color: #4b5563;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .form-input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    body {
        background-color: white;
        margin: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .page-container {
        position: relative;
        flex: 1;
        width: 100%;
        padding: 30px;
    }

    .btn-back {
        position: absolute;
        top: 30px;
        right: 30px;
        padding: 12px 24px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
        z-index: 1000;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .btn-back svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }
    </style>
</head>
<body>
<?php include __DIR__ . '/../../header.php'; ?>
<div class="page-container">
<?php
// Obtener el ID del producto de la URL
$id_producto = isset($_GET['id']) ? $_GET['id'] : null;

// Obtener los datos del producto
$productoModel = new ProductoModel();
$producto = $productoModel->obtenerProductoPorId($id_producto);

// Si no se encuentra el producto, redirigir
if (!$producto) {
    header('Location: ?action=PanelAdmin');
    exit;
}
?>



<a href="?action=PanelAdmin" class="btn-back">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
    </svg>
    Volver
</a>

<div class="form-container">
    <h2 class="form-title">Modificar Producto</h2>
    
    <form id="formModificarProducto" method="POST" action="?action=ActualizarProducto">
        <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($producto['id_producto']); ?>">
        
        <div class="form-group">
            <label class="form-label" for="nombre">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" class="form-input" 
                   value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-input form-textarea" 
                      required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="precio">Precio (€)</label>
            <input type="number" id="precio" name="precio" class="form-input" 
                   value="<?php echo htmlspecialchars($producto['precio']); ?>" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-input" 
                   value="<?php echo htmlspecialchars($producto['stock']); ?>" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="categoria">Categoría</label>
            <input type="text" id="categoria" name="categoria" class="form-input" 
                   value="<?php echo htmlspecialchars($producto['categoria']); ?>" required>
        </div>
        
        <button type="submit" class="btn-submit">Guardar Cambios</button>
    </form>
</div>
</div>
<?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
