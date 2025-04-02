
       <!-- Formulario Añadir Producto -->
       <div class="añadirProducto">
            <h2>Añadir Nuevo Producto</h2>
            <form action="?action=SaveProducts" method="post" id="form-addUsuarios">
                <label for="productName">Nombre del Producto</label>
                <input type="text" name="productName" id="productName" required>

                <label for="productDescription">Descripción</label>
                <input type="text" name="productDescription" id="productDescription" required>

                <label for="productPrice">Precio</label>
                <input type="number" name="productPrice" id="productPrice" required>

                <label for="productStock">Stock</label>
                <input type="number" name="productStock" id="productStock" required>

                <label for="productImage">Dirección de Imagen</label>
                <input type="text" name="productImage" id="productImage" required>

                <button id="botton_Funcion" type="submit">Añadir Producto</button>
            </form>
        </div>
        <style> 
            .añadirProducto{

            }
            #form-addUsuarios{
                display: flex;
                /* flex-direction: column; */
                background-color:  #fffc;
                width: 400px;
                align-items: center;
            }
            #form-addUsuarios input{
                width:200px;
                height:30px;
                border-radius: 5px ;
            }
        </style>

