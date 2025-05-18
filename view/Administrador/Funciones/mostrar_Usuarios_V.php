
<?php
require_once __DIR__ . '/../../../controller/Usuario/listarUsuarios.php';
?>

    <div class="users-container">
        <?php if ($usuarios): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <div class="user-card">
                    <div class="user-header">
                        <h3><?php echo htmlspecialchars($usuario['nombre_cuenta']); ?></h3>
                        <span class="user-role"><?php echo htmlspecialchars($usuario['rol']); ?></span>
                    </div>
                    <div class="user-info">
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($usuario['id_usuario']); ?></p>
                        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
                        <p><strong>Apellido:</strong> <?php echo htmlspecialchars($usuario['apellido']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
                        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($usuario['direccion']); ?></p>
                        <p><strong>Fecha registro:</strong> <?php echo htmlspecialchars($usuario['fecha_registro']); ?></p>
                    </div>
                    <div class="user-actions">
                        <button class="btn-modificar" onclick="modificarUsuario(<?php echo $usuario['id_usuario']; ?>)">Modificar</button>
                        <button class="btn-eliminar" onclick="eliminarUsuario(<?php echo $usuario['id_usuario']; ?>)">Eliminar</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-users">No hay usuarios registrados</p>
        <?php endif; ?>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirmar Eliminación</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar este usuario?</p>
                <p>Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button id="confirmDelete" class="btn-eliminar">Eliminar</button>
                <button class="btn-cancelar" onclick="closeModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
    function modificarUsuario(id) {
        window.location.href = '?action=ModificarUsuario&id=' + id;
    }

    let userIdToDelete = null;
    const modal = document.getElementById('confirmModal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const confirmBtn = document.getElementById('confirmDelete');

    function eliminarUsuario(id) {
        userIdToDelete = id;
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
        if (userIdToDelete) {
            window.location.href = 'controller/Usuario/eliminarUsuario.php?id=' + userIdToDelete;
        }
    }
    </script>

<style>
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

/* Estilos del contenedor de usuarios */
.users-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    padding: 20px;
    /* background: #f5f5f5; */
    max-width: 100%;
    margin: 0 auto;
}

@media (max-width: 1200px) {
    .users-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .users-container {
        grid-template-columns: repeat(1, 1fr);
    }
}

.user-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.2s;
    min-width: 0; /* Evita que las cards se desborden */
    height: 100%; /* Asegura altura uniforme */
    display: flex;
    flex-direction: column;
}

.user-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.user-header {
    background: #1a237e;
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.user-header h3 {
    margin: 0;
    font-size: 1.2em;
}

.user-role {
    background: rgba(255,255,255,0.2);
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.9em;
}

.user-info {
    padding: 15px;
    flex: 1; /* Hace que esta sección ocupe el espacio disponible */
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.user-info p {
    margin: 8px 0;
    color: #333;
}

.user-info strong {
    color: #1a237e;
}

.user-actions {
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

.no-users {
    grid-column: 1 / -1;
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 10px;
    color: #666;
}
</style>
</style>