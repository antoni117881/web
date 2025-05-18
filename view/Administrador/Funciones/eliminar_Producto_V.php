<div>
    <!-- Formulario Eliminar Producto -->
    <div class="form-container">
        <h2>Eliminar Producto</h2>
        
        <label for="idProductDelete">Id Producto</label>
        <input type="text" name="idProductDelete" id="idProductDelete" required>

        <button id="botton_Funcion_delete">Eliminar Producto</button>
    </div>

    <!-- Formulario Buscar Producto por id  (otro bloque) -->
    <div class="form-container">
        <h2>Buscar Producto</h2>
        
        <label for="idProductSearch">Id Producto</label>
        <input type="text" name="idProductSearch" id="idProductSearch" required>

        <button id="boton_Buscar">Buscar Producto</button>
    </div>
    <script>
        document.getElementById('boton_Buscar').addEventListener('click', function(event) {
            event.preventDefault();

            var idProducto = document.getElementById('idProductSearch').value.trim();

            if (!idProducto) {
                alert('Por favor, ingresa un ID de producto');
                return;
            }

            fetch('controller/producto/listarProductosId.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id_producto: idProducto })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Producto encontrado: ' + JSON.stringify(data.producto));
                    console.log(data.producto);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error en fetch:', error);
                alert('Error de conexión con el servidor.');
            });
        });
    </script>

</div>

<script>
    // Eliminar Producto
    document.getElementById('botton_Funcion_delete').addEventListener('click', function(event) {
        event.preventDefault();

        var idProduct = document.getElementById('idProductDelete').value.trim();
        if (!idProduct) {
            alert('Por favor, introduce un ID de producto válido.');
            return;
        }

        deleteProducto(idProduct);
    });

    function deleteProducto(idProduct) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "controller/producto/eliminarProducto.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
        console.log('Respuesta cruda del servidor:', xhr.responseText); // 👈 Agregado

        try {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Producto eliminado correctamente');
                location.reload();
            } else {
                alert('Error al eliminar el producto: ' + (response.message || 'Error desconocido'));
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
            alert('Error del servidor. Por favor, inténtalo de nuevo.');
        }
    }
};
        var data = {
            id_producto: idProduct
        };

        xhr.send(JSON.stringify(data));
    }
</script>
