
       <!-- Formulario Añadir Producto -->
       <div class="añadirProducto">
            <h2>Añadir Nuevo Producto</h2>
            <form action="?action=SaveProducts" method="post" id="form-addUsuarios">
                <div class="form-group">
                <label for="productName">Nombre del Producto</label>
                <input type="text" name="productName" id="productName" required>
                </div>

                <div class="form-group">
                <label for="productDescription">Descripción</label>
                <input type="text" name="productDescription" id="productDescription" required>
                </div>

                <div class="form-group">
                <label for="productPrice">Precio</label>
                <input type="number" name="productPrice" id="productPrice" required>
                </div>
                <div class="form-group">
                <label for="productStock">Stock</label>
                <input type="number" name="productStock" id="productStock" required>
               
                </div>
                <div class="form-group">
                <label for="productImage">Dirección de Imagen</label>
                <input type="text" name="productImage" id="productImage" required>
                </div>
                <div class="form-group">
                <button id="botton_Funcion" type="submit">Añadir Producto</button>
                </div>
            </form>
          
        </div>
        <style> 
          
            .añadirProducto form{
                display: grid;
                /* flex-direction: column; */
                width: 70%;
                margin-top: 20px;
                grid-template-columns: 1fr 1fr 1fr;
                height: 150px;
            }
         
            .form-group label{
                font-weight: 400;
                display: block;
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

