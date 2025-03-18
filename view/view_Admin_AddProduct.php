<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(95, 168, 188),rgb(96, 110, 171));
            
        }
        .Container-Menu{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 70vh;
        }
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 600;
            color: #333;
        }

        label {
            font-weight: 400;
            display: block;
            margin-top: 12px;
            text-align: left;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: 0.3s;
            font-size: 14px;
        }

        input:focus {
            border-color: #74ebd5;
            box-shadow: 0 0 5px rgba(116, 235, 213, 0.5);
            outline: none;
        }

        button {
            width: 100%;
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

        button:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="">
            <?php
            include __DIR__. "./header.php";
            ?>
   </div>
    <div class="">
            <?php
            include __DIR__. "./header_ControlAdmin.php";
            ?>
   </div>
   <div class="Container-Menu">
    <!-- Añadir Producto -->
    <div class="form-container">
        <h2>Añadir Nuevo Producto</h2>
        <form action="?action=SaveProducts" method="post" id="addProductForm">
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

            <button id="botton_Funcion"type="submit" >Añadir Producto</button>
        </form>
    </div>
   <!-- Eliminar Producto -->
<div class="form-container">
    <h2>Eliminar Producto</h2>
    <form id="deleteProductForm">
        <label for="idProduct">Id Producto</label>
        <input type="text" name="idProduct" id="idProduct" required>

        <label for="nombreProduct">Nombre de Producto</label>
        <input type="text" name="nombreProduct" id="nombreProduct" required>

        <!-- Campo oculto para capturar el valor de la acción -->
        <input type="hidden" id="action" value="deleteProduct">

        <button id="botton_Funcion" type="submit">Eliminar Producto</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#deleteProductForm').on('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            
            var seleccion = $('#action').val(); // Obtiene el valor del campo oculto
            // var idProduct = $('#idProduct').val(); // Obtiene el valor del campo idProduct
            // var nombreProduct = $('#nombreProduct').val(); // Obtiene el valor del campo nombreProduct
            $.ajax({
                url: 'controller/panelAdmin.php',
                type: 'POST',
                data: {
                    action: seleccion,
                    idProduct: $('#idProduct').val(),
                    nombreProduct: $('#nombreProduct').val()
                },
                success: function(response) {
                    alert(response);
                }
                error: function(error) {
                    alert("Ocurrió un error al procesar la solicitud.");
                }
            })

            alert("Has seleccionado: " + seleccion);
        });
    });
</script>


   <!-- Modificar Usuario -->
<div class="form-container">
    <h2>Modificar Usuario</h2>
    <form id="editUsuarioForm">
        <label for="idUsuario">Id Usuario</label>
        <input type="text" name="idUsuario" id="idUsuario" required>
        <label for="nombreUsuario">Nombre de Usuario</label>
        <input type="text" name="nombreUsuario" id="nombreUsuario" required>
        <input type="hidden" id="action" value="editUser">
        <button id="botton_Funcion" type="submit" value="editUser">Editar Usuario</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#editUsuarioForm').on('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            var seleccion = $('#action').val(); // Obtiene el valor del botón
            // var idUsuario = $('#idUsuario').val(); // Obtiene el valor del campo idUsuario
            // var nombreUsuario = $('#nombreUsuario').val(); // Obtiene el valor del campo nombreUsuario

            $.ajax({
                url: 'controller/panelAdmin.php',
                type: 'POST',
                data: {
                    action: seleccion,
                    idUsuario: $('#idUsuario').val(),
                    nombreUsuario: $('#nombreUsuario').val()
                },
                success: function(response) {
                    alert(response);
                }
                error: function(error) {
                    alert("Ocurrió un error al procesar la solicitud.");
                }
            });
           
            
            alert("Has seleccionado: " + seleccion);
        });
    });
</script>

</body>
</html>
