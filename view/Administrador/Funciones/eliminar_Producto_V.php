<div >
        <!-- Formulario Eliminar Producto -->
        <div class="form-container">
            <h2>Eliminar Producto</h2>
            
                <label for="idProduct">Id Producto</label>
                <input type="text" name="idProduct" id="idProduct" required>

                <!-- <label for="nombreProduct">Nombre de Producto</label>
                <input type="text" name="nombreProduct" id="nombreProduct" required> -->

                <input type="hidden" id="action" value="deleteProduct">

                <button id="botton_Funcion_delete" >Eliminar Producto</button>
            
        </div>
        <script>
        // Eliminar Producto
        document.getElementById('botton_Funcion_delete').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el envío del formulario

            var idProduct = document.getElementById('idProduct').value;
            
            console.log(idProduct);
            deleteProducto(idProduct);
        });

        function deleteProducto(idProduct) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "controller/producto/eliminarProducto.php", true); // controller/producto/eliminarProducto
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function() {
            
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            var data = xhr.responseText; // Convertir la respuesta en objeto
                            console.log(data)
                            if (data.success) {
                                alert('Producto eliminado correctamente');
                            } else {
                                alert('Error al eliminar el producto: ' + (data.message || 'Error desconocido'));
                            }
                        } catch (error) {
                            alert('Error al procesar la respuesta del servidor  ' +  error);
                            
                        }
                    } else {
                        alert('Error en la solicitud ELIMINAR PRODUCTO: ' + xhr.status);
                    }
                }
            };
            // aqui se envian los datos al controlador 
            var body = JSON.stringify({ id_producto: idProduct }); 
            xhr.send(body);
        }
    </script>
</div>