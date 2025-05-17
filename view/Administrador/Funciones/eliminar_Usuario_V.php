<div>
    <div class="form-container">
        <h2>Eliminar Usuario</h2>
        <form id="editUsuarioForm">
            <label for="idUsuario">Id Usuario</label>
            <input type="text" name="idUsuario" id="idUsuario" required>
            <label for="nombreUsuario">Nombre de Usuario</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" required>
            <?php
// Conexión a la base de datos
require_once __DIR__ . '/../../../model/conection_BD.php';

// Obtener la conexión
$db = DB::getInstance();

// Consulta para obtener usuarios
$query = $db->prepare("SELECT id_usuario, nombre_cuenta FROM usuarios ORDER BY nombre_cuenta");
$result = $query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); ?>
            <input type="hidden" id="action" value="editUser">
            <button id="botton_Funcion" value="editUser">Eliminar Usuario</button>
        </form>
    </div>
</div>