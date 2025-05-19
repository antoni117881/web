<?php
// Almacenar la acción en una variable PHP
$adminAction = isset($_POST['adminAction']) ? $_POST['adminAction'] : 'ver_productos';
?>

<div>
    <div class="Container_Panel">
        <h1>Panel de Administrador</h1>
        
        <!-- Sección de Productos -->
        <div class="seccion-admin" id="seccion-productos">
            <h2>Administración de Productos</h2>
            <div class="botones-admin">
                <form method="post">
                    <input type="hidden" name="adminAction" value="añadir_producto">
                    <input type="submit" value="Añadir" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="ver_productos">
                    <input type="submit" value="Ver" />
                </form>
            </div>
        </div>

        <!-- Sección de Usuarios -->
        <div class="seccion-admin" id="seccion-usuarios">
            <h2>Administración de Usuarios</h2>
            <div class="botones-admin">
                <form method="post">
                    <input type="hidden" name="adminAction" value="añadir_usuario">
                    <input type="submit" value="Añadir" />
                </form>
                
                <form method="post">
                    <input type="hidden" name="adminAction" value="ver_usuarios">
                    <input type="submit" value="Ver" />
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.Container_Panel {
    background: linear-gradient(135deg, #f5f7fa, #e0eafc);
    width: 320px;
    max-width: 90vw;
    min-height: 400px;
    padding: 24px 28px;
    border-radius: 16px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: all 0.3s ease;
}

.Container_Panel h1 {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 18px;
    color: #1a1a1a;
    border-bottom: 3px solid #4f46e5;
    padding-bottom: 10px;
    letter-spacing: 0.5px;
}

.seccion-admin {
    background: #fff;
    border-radius: 12px;
    padding: 16px 20px;
    box-shadow: 0 2px 8px rgba(79, 70, 229, 0.15);
    margin-bottom: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.seccion-admin h2 {
    font-size: 1.25rem;
    margin-bottom: 12px;
    font-weight: 600;
    color: #4f46e5;
    border-left: 4px solid #4f46e5;
    padding-left: 14px;
}

.botones-admin {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* dos columnas iguales */
    gap: 12px;
    overflow-y: auto;
    padding-right: 4px;
    justify-items: center; /* centra los botones en la celda */
}

.botones-admin form {
    width: 100%; /* para que el form ocupe todo el grid cell */
    display: flex;
    justify-content: center; /* centra el input dentro del form */
}

.botones-admin input[type="submit"] {
    background-color: #4f46e5;
    border: none;
    color: white;
    padding: 0; /* padding en input para controlar altura */
    border-radius: 8px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(79, 70, 229, 0.3);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    user-select: none;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;

    width: 120px;   /* ancho fijo */
    height: 36px;   /* alto fijo */
    line-height: 36px; /* centra vertical texto */
}

.botones-admin input[type="submit"]:hover {
    background-color: #4338ca;
    box-shadow: 0 5px 15px rgba(67, 56, 202, 0.4);
}

.botones-admin input[type="submit"]:active {
    box-shadow: 0 2px 6px rgba(67, 56, 202, 0.3);
}

@media (max-width: 600px) {
    .Container_Panel {
        width: 100%;
        min-height: auto;
        padding: 20px 16px;
    }

    .botones-admin {
        grid-template-columns: 1fr; /* apilar botones en móvil */
        gap: 10px;
        justify-items: stretch;
    }

    .botones-admin form {
        width: 100%;
        justify-content: stretch;
    }

    .botones-admin input[type="submit"] {
        width: 100%;      /* ocupan todo el ancho en móvil */
        height: 36px;
        line-height: 36px;
        font-size: 0.9rem;
        padding: 0;
    }
}
</style>
