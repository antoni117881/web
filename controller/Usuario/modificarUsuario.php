<?php
require_once __DIR__ . '/../../model/usuario_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nombre_cuenta = $_POST['nombre_cuenta'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];

    try {
        $db = DB::getInstance();
        
        $query = $db->prepare("UPDATE usuarios SET 
            nombre_cuenta = :nombre_cuenta,
            nombre = :nombre,
            apellido = :apellido,
            email = :email,
            telefono = :telefono,
            direccion = :direccion,
            rol = :rol
            WHERE id_usuario = :id_usuario");

        $query->bindParam(':id_usuario', $id_usuario);
        $query->bindParam(':nombre_cuenta', $nombre_cuenta);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellido', $apellido);
        $query->bindParam(':email', $email);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':rol', $rol);

        if ($query->execute()) {
            echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
                <input type='hidden' name='adminAction' value='ver_usuarios'>
                <input type='hidden' name='success' value='1'>
            </form>
            <script>document.getElementById('redirectForm').submit();</script>";
        } else {
            echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
                <input type='hidden' name='adminAction' value='ver_usuarios'>
                <input type='hidden' name='error' value='1'>
            </form>
            <script>document.getElementById('redirectForm').submit();</script>";
        }
    } catch (PDOException $e) {
        header('Location: ../../index.php?action=MostrarUsuarios&error=1');
    }
} else {
    echo "<form id='redirectForm' action='../../index.php?action=PanelAdmin' method='POST'>
        <input type='hidden' name='adminAction' value='ver_usuarios'>
    </form>
    <script>document.getElementById('redirectForm').submit();</script>";
}
?>
