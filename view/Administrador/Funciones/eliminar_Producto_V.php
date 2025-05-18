<div class="admin-layout">
    <!-- Formularios (izquierda) -->
    <div class="form-section">
        <!-- Formulario Eliminar Producto -->
        <div class="form-container">
            <h2>Eliminar Producto</h2>
            <label for="idProductDelete">ID del Producto</label>
            <input type="text" id="idProductDelete" placeholder="Ingrese ID del producto">
            <button id="botton_Funcion_delete">Eliminar Producto</button>
        </div>

        <!-- Formulario Buscar Producto -->
        <div class="form-container">
            <h2>Buscar Producto</h2>
            <label for="idProductSearch">ID del Producto</label>
            <input type="text" id="idProductSearch" placeholder="Ingrese ID del producto">
            <button id="boton_Buscar">Buscar Producto</button>
        </div>
    </div>

    <!-- Tarjeta (derecha) -->
    <div class="card-section">
        <div id="productoCard" class="card" style="display:none;">
            <h3>Producto Encontrado</h3>
            <p><strong>ID:</strong> <span id="card_id"></span></p>
            <p><strong>Nombre:</strong> <span id="card_nombre"></span></p>
            <p><strong>Descripción:</strong> <span id="card_descripcion"></span></p>
            <p><strong>Precio:</strong> $<span id="card_precio"></span></p>
            <p><strong>Stock:</strong> <span id="card_stock"></span> unidades</p>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/../../../controller/producto/listarProductos.php';
?>
<table>
    <caption>Listado de Productos</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!$productos): ?>
        <tr><td colspan="6" style="text-align:center;">No hay productos para mostrar.</td></tr>
    <?php else: ?>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['id_producto']); ?></td>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                <td><?php echo number_format($producto['precio'], 2, ',', '.'); ?> €</td>
                <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

<!-- Modal de Mensajes -->
<div id="popupModal" class="popup-modal">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <p id="popupMessage"></p>
    </div>
</div>

<!-- Estilos -->
<style>
    .admin-layout {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 30px;
        align-items: flex-start;
        padding: 20px;
    }

    .form-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        max-width: 100%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        margin-top: 0;
        color: #333;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-container input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .form-container button {
        padding: 10px 15px;
        background-color: #007bff;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .form-container button:hover {
        background-color: #0056b3;
    }

    .card-section {
        width: 100%;
        margin-top: 50px;
    }

    .card {
        background-color: #f5f5f5;
        border-left: 5px solid #007bff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        font-size: 16px;
    }

    .card h3 {
        margin-top: 0;
        color: #007bff;
        font-size: 22px;
    }

    .card p {
        margin: 8px 0;
    }

    .card strong {
        color: #222;
    }

    @media (max-width: 768px) {
        .admin-layout {
            grid-template-columns: 1fr;
        }
        .card-section {
            margin-top: 20px;
        }
    }

    /* Estilos para popup modal */
    .popup-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }

    .popup-content {
        background-color: #fff0f0;
        margin: 10% auto;
        padding: 30px;
        border: 1px solid #e74c3c;
        width: 320px;
        border-radius: 10px;
        position: relative;
        text-align: center;
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.5);
        color: #c0392b;
        font-weight: bold;
        font-size: 17px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .popup-content p {
        margin: 0;
        margin-left: 10px;
        font-size: 16px;
        color: #c0392b;
    }

    .close-btn {
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 24px;
        cursor: pointer;
        color: #c0392b;
        font-weight: bold;
    }

    /* Icono de error estilo SVG */
    .error-icon {
        width: 24px;
        height: 24px;
        fill: #c0392b;
        margin-right: 8px;
    }
    table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        caption {
            margin-bottom: 15px;
            font-size: 24px;
            font-weight: bold;
        }

</style>

<!-- Script -->
<script>
    let productoEncontrado = null;

    function showPopup(message) {
        const popupModal = document.getElementById('popupModal');
        const popupMessage = document.getElementById('popupMessage');
        // Añadir icono error SVG antes del mensaje
        popupMessage.innerHTML = `
            <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10
                10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1
                1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm0-10c-.83 0-1.5.67-1.5
                1.5S11.17 10 12 10s1.5-.67 1.5-1.5S12.83 7 12 7z"/>
            </svg>` + message;
        popupModal.style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popupModal').style.display = 'none';
    }

    document.getElementById('boton_Buscar').addEventListener('click', function (event) {
        event.preventDefault();

        const idProducto = document.getElementById('idProductSearch').value.trim();

        if (!idProducto) {
            showPopup('Por favor, ingresa un ID de producto');
            return;
        }

        fetch('controller/producto/listarProductosId.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id_producto: idProducto })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                productoEncontrado = data.producto;

                document.getElementById('card_id').textContent = productoEncontrado.id_producto;
                document.getElementById('card_nombre').textContent = productoEncontrado.nombre;
                document.getElementById('card_descripcion').textContent = productoEncontrado.descripcion;
                document.getElementById('card_precio').textContent = productoEncontrado.precio;
                document.getElementById('card_stock').textContent = productoEncontrado.stock;
                document.getElementById('productoCard').style.display = 'block';
            } else {
                showPopup('Error: ' + data.message);
                productoEncontrado = null;
                document.getElementById('productoCard').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error en fetch:', error);
            showPopup('Error de conexión con el servidor.');
            productoEncontrado = null;
            document.getElementById('productoCard').style.display = 'none';
        });
    });

    document.getElementById('botton_Funcion_delete').addEventListener('click', function (event) {
        event.preventDefault();

        const idProduct = document.getElementById('idProductDelete').value.trim();
        if (!idProduct) {
            showPopup('Por favor, introduce un ID de producto válido.');
            return;
        }

        deleteProducto(idProduct);
    });

    function deleteProducto(idProduct) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controller/producto/eliminarProducto.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        showPopup('Producto eliminado correctamente');
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        let msg = response.message || 'Error desconocido';
                        if (msg.toLowerCase().includes('error al eliminar el producto')) {
                            showPopup(msg);
                        } else {
                            showPopup('Error al eliminar el producto: ' + msg);
                        }
                    }
                } catch (error) {
                    console.error('Error al parsear JSON:', error);
                    showPopup('Error del servidor. Por favor, inténtalo de nuevo.');
                }
            }
        };

        xhr.send(JSON.stringify({ id_producto: idProduct }));
    }
</script>
