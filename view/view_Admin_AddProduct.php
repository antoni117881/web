<html>
    
    <body>
    <div>
        <h1>Añadir Nuevo Producto</h1>
        <div>
        <form action="?action=SaveProducts" method="post">
                <label for="name">Nombre del Producto</label>
                <input type="text" name="name" id="name" required>
                <label for="description">Descripción</label>
                <input type="text" name="description" id="description" required>
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" required>
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" required>
                <label for="image">Direccion de Imagen</label>
                <input type="text" name="image" id="image" required>
                <button type="submit">Añadir Producto</button>
            </form>
        </div>

    </div>
    </body>

    
</html>