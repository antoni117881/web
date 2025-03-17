<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(95, 168, 188),rgb(96, 110, 171));
            
        }
        .Container-Menu{
            display: flex;
            justify-content: center;
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
   <div class="Container-Menu">
    <div class="form-container">
        <h2>Añadir Nuevo Producto</h2>
        <form action="?action=SaveProducts" method="post">
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

            <button type="submit">Añadir Producto</button>
        </form>
    </div>
   </div>
</body>
</html>
