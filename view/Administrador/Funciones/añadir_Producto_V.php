
       <!-- Formulario Añadir Producto -->
       <div class="añadirProducto">
            <h2>Añadir Nuevo Producto</h2>
            <form action="?action=SaveProducts" method="post" id="form-addUsuarios">
                <div class="form-group">
                <label for="productName">Nombre del Producto</label>
                <input type="text" name="productName" id="productName" required>
                </div>

                <label for="productDescription">Descripción</label>
                <input type="text" name="productDescription" id="productDescription" required>
                </div>

                <div class="form-group">
                <?php
include __DIR__. "/../../../model/conection_BD.php";
?>

<div class="form-container">
    <h2>Añadir Nuevo Producto</h2>
    <form action="?action=guardar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="zapatillas">Zapatillas</option>
                <option value="sandalias">Sandalias</option>
                <option value="botas">Botas</option>
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>
        </div>

        <button type="submit" class="submit-button">Añadir Producto</button>
    </form>
</div>

<style>
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .submit-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #45a049;
    }
</style>    <label for="productImage">Dirección de Imagen</label>
                <input type="text" name="productImage" id="productImage" required>
                </div>
                <div class="form-group">
                <button id="botton_Funcion" type="submit">Añadir Producto</button>
                </div>
{{ ... }}
          
        </div>
                margin-top: 12px;
                text-align: left;
                color: #555;
            }
            .form-group  input{
                border: 1px solid #ccc;
                height: 30px;
                width: 300px;
                
            }
            .form-group button{
                width: 300px;
                background: #007BFF;
                color: white;
                border: none;
                padding: 12px;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 20px;
                font-size: 16px;
                font-weight: 600;
                transition: 0.3s;
            }

            
            
        </style>

