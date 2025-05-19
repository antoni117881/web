<?php
require_once __DIR__ . '/../../model/usuario_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    
    try {
        $db = DB::getInstance();
        
        // Verificar si el usuario existe
        $query = $db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
        $query->bindParam(':id', $id_usuario);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            // Eliminar el usuario
            $delete = $db->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
            $delete->bindParam(':id', $id_usuario);
            
            if ($delete->execute()) {
                // Éxito - Redirigir usando POST
                echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
                    <input type='hidden' name='adminAction' value='ver_usuarios'>
                    <input type='hidden' name='success' value='1'>
                    <input type='hidden' name='message' value='Usuario eliminado correctamente'>
                </form>
                <script>document.getElementById('redirectForm').submit();</script>";
            } else {
                throw new Exception("Error al eliminar el usuario");
            }
        } else {
            throw new Exception("Usuario no encontrado");
        }
    } catch (Exception $e) {
        echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
            <input type='hidden' name='adminAction' value='ver_usuarios'>
            <input type='hidden' name='error' value='1'>
            <input type='hidden' name='message' value='Error: " . htmlspecialchars($e->getMessage()) . "'>
        </form>
        <script>document.getElementById('redirectForm').submit();</script>";
    }
} else {
    echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
        <input type='hidden' name='adminAction' value='ver_usuarios'>
        <input type='hidden' name='error' value='1'>
        <input type='hidden' name='message' value='ID de usuario no especificado'>
    </form>
    <script>document.getElementById('redirectForm').submit();</script>";
}
?>
