<?php
require_once __DIR__ . '/../../../controller/producto/listarProductos.php';
?>

<div class="page-title">
    <h1>Gestión de Productos</h1>
</div>

<style>
.page-title {
    text-align: center;
    padding: 20px 0;
    margin-bottom: 20px;
}

.page-title h1 {
    color: #1a237e;
    font-size: 2em;
    margin: 0;
    font-weight: 600;
}
/* Estilos del modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 0;
    border-radius: 8px;
    width: 400px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    animation: modalSlide 0.3s ease-out;
}

@keyframes modalSlide {
    from {transform: translateY(-100px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

.modal-header {
    padding: 15px 20px;
    background: #1a237e;
    color: white;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h2 {
    margin: 0;
    font-size: 1.25em;
}

.close {
    color: white;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #ddd;
}

.modal-body {
    padding: 20px;
    color: #333;
}

.modal-footer {
    padding: 15px 20px;
    background: #f5f5f5;
    border-radius: 0 0 8px 8px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

/* Estilos del contenedor de productos */
.products-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
  
    max-width: 100%;
    margin: 0 auto;
}

.product-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.2s;
    min-width: 0;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.product-header {
    background: #1a237e;
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-header h3 {
    margin: 0;
    font-size: 1.2em;
}

.product-id {
    background: rgba(255,255,255,0.2);
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.9em;
}

.product-info {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.product-info p {
    margin: 8px 0;
    color: #333;
}

.product-info strong {
    color: #1a237e;
}

.product-actions {
    padding: 15px;
    display: flex;
    gap: 10px;
    border-top: 1px solid #eee;
}

.btn-modificar, .btn-eliminar {
    flex: 1;
    padding: 8px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-modificar {
    background: #4CAF50;
    color: white;
}

.btn-eliminar {
    background: #f44336;
    color: white;
}

.btn-modificar:hover {
    background: #45a049;
}

.btn-eliminar:hover {
    background: #da190b;
}

.no-products {
    grid-column: 1 / -1;
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 10px;
    color: #666;
}

@media (max-width: 1200px) {
    .products-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .products-container {
        grid-template-columns: repeat(1, 1fr);
    }
}
</style>


<div class="products-container">
    <?php if ($productos): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="product-card">
                <div class="product-header">
                    <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                    <span class="product-id">ID: <?php echo htmlspecialchars($producto['id_producto']); ?></span>
                </div>
                <div class="product-info">
                    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['descripcion']); ?></p>
                    <p><strong>Precio:</strong> <?php echo htmlspecialchars($producto['precio']); ?>€</p>
                    <p><strong>Stock:</strong> <?php echo htmlspecialchars($producto['stock']); ?> unidades</p>
                </div>
                <div class="product-actions">
                    <button class="btn-modificar" onclick="modificarProducto(<?php echo $producto['id_producto']; ?>)">Modificar</button>
                    <button class="btn-eliminar" onclick="eliminarProducto(<?php echo $producto['id_producto']; ?>)">Eliminar</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-products">No hay productos registrados</p>
    <?php endif; ?>
</div>

<!-- Modal de confirmación para eliminar producto -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Confirmar Eliminación</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de que desea eliminar este producto?</p>
            <p>Esta acción no se puede deshacer.</p>
        </div>
        <div class="modal-footer">
            <button id="confirmDelete" class="btn-eliminar">Eliminar</button>
            <button class="btn-cancelar" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>

<script>
function modificarProducto(id) {
    window.location.href = '?action=ModificarProducto&id=' + id;
}

let productIdToDelete = null;
const modal = document.getElementById('confirmModal');
const closeBtn = document.getElementsByClassName('close')[0];
const confirmBtn = document.getElementById('confirmDelete');

function eliminarProducto(id) {
    productIdToDelete = id;
    modal.style.display = 'block';
}

function closeModal() {
    modal.style.display = 'none';
}

closeBtn.onclick = closeModal;

window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

confirmBtn.onclick = function() {
    if (productIdToDelete) {
        fetch('controller/producto/eliminarProducto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id_producto: productIdToDelete
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar el producto');
        });
        closeModal();
    }
}
</script>
