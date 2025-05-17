<?php
// Almacenar la acción en una variable PHP
$adminAction = isset($_POST['adminAction']) ? $_POST['adminAction'] : 'ver_productos';
?>

<div >
    <div class="Container_Panel">
        <h1>Panel de Administrador</h1>
        
        <!-- Sección de Productos -->
        <div class="seccion-admin" id="seccion-productos">
            <h2>Administración de Productos</h2>
            <div class="botones-admin">
                <form method="post">
                    <input type="hidden" name="adminAction" value="añadir_producto">
                    <input type="submit" value="Añadir Producto" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="eliminar_producto">
                    <input type="submit" value="Eliminar Producto" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="modificar_producto">
                    <input type="submit" value="Modificar Producto" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="ver_productos">
                    <input type="submit" value="Ver Productos" />
                </form>
            </div>
        </div>

        <!-- Sección de Usuarios -->
        <div class="seccion-admin" id="seccion-usuarios">
            <h2>Administración de Usuarios</h2>
            <div class="botones-admin">
                <form method="post">
                    <input type="hidden" name="adminAction" value="añadir_usuario">
                    <input type="submit" value="Añadir Usuario" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="eliminar_usuario">
                    <input type="submit" value="Eliminar Usuario" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="modificar_usuario">
                    <input type="submit" value="Modificar Usuario" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="ver_usuarios">
                    <input type="submit" value="Ver Usuarios" />
                </form>
            </div>
        </div>
    </div>
</div>
<style>
.Container_Panel {
    background-color: #1f2937;
    width: 280px;
    height: 100vh;
    padding: 25px 20px;
    border-radius: 12px;
    color: #f3f4f6;
    box-shadow: 0 4px 15px rgba(0,0,0,0.6);
    display: flex;
    flex-direction: column;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow: hidden;
}

.Container_Panel h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 20px;
    text-align: center;
    border-bottom: 2px solid #2563eb;
    padding-bottom: 12px;
    letter-spacing: 1px;
    flex-shrink: 0;
}

.seccion-admin {
    background-color: #374151;
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 20px;
    box-shadow: inset 0 0 10px rgba(255,255,255,0.05);
    overflow-y: auto;
    flex-grow: 1;
}

.seccion-admin:last-of-type {
    margin-bottom: 0;
}

.seccion-admin h2 {
    font-size: 1.25rem;
    margin-bottom: 18px;
    font-weight: 600;
    color: #e0e7ff;
    border-left: 4px solid #2563eb;
    padding-left: 12px;
}

.botones-admin {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.botones-admin input[type="submit"] {
    background-color: #2563eb;
    border: none;
    color: #f3f4f6;
    padding: 12px 0;
    border-radius: 8px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.25s ease, box-shadow 0.25s ease;
    box-shadow: 0 3px 8px rgba(37, 99, 235, 0.4);
    user-select: none;
}

.botones-admin input[type="submit"]:hover {
    background-color: #1e40af;
    box-shadow: 0 5px 15px rgba(30, 64, 175, 0.6);
}

.botones-admin input[type="submit"]:active {
    transform: translateY(1px);
    box-shadow: 0 2px 6px rgba(30, 64, 175, 0.5);
}

.seccion-admin::-webkit-scrollbar {
    width: 6px;
}
.seccion-admin::-webkit-scrollbar-thumb {
    background-color: #2563eb;
    border-radius: 3px;
}
.seccion-admin::-webkit-scrollbar-track {
    background-color: transparent;
}

@media (max-width: 480px) {
    .Container_Panel {
        width: 100%;
        height: auto;
        padding: 20px 15px;
    }
    .seccion-admin {
        margin-bottom: 15px;
    }
    .botones-admin input[type="submit"] {
        font-size: 0.9rem;
        padding: 10px 0;
    }
}
</style>

