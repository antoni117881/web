<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Reset de CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(95, 168, 188),rgb(96, 110, 171));
        }
  
        /* 
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
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
        } */
        .Contenedor_Pagina{
            display: grid;
            grid-template-columns: 1fr 5fr; 
            height: auto;
            height: 90%;
        }
        .Container-Menu{

        }
    </style>
</head>
<body>
   
    <div >
        <?php
        include __DIR__. "/view/header.php";
        ?>
    </div>
    
    <div class="Contenedor_Pagina ">

        <div >
            <?php
            include __DIR__. "/view/Administrador/Panel_Admin_V.php";
            ?>
        </div>

        <div class="Container-Menu">    
        
            <!-- <?php 
            //! DEPENDERA DE UNA VARIABLE QUE SE RECIBIRA SI ES TRUO O FALSA DESDE LA FUNCION DEL BOOTN EN EL PANEL DE CONTROL DE ADMIIN
            ?> -->

            <?php 
            $sesion_Start = $_SESSION[""] ?? null;
            
            ?>
            <!-- AÑADIR PRODUCTO -->
            <div class="">
            
            <?php 
                include __DIR__. "/view/Administrador/Funciones_Productos_V.php";  
                //todo: include __DIR__. "/view/Administrador/Funciones/añadir_Producto_V.php";  
                //todo: include __DIR__. "/view/Administrador/Funciones/eliminar_Producto_V.php"; 

            ?>

            </div>
            
            <!-- ELIMINAR PRODUCTO -->
            <div class="">
                <?php 
                    // include __DIR__. "/view/Administrador/Funciones/eliminar_Producto_V.php";  
                ?>
            </div>
            <!-- ELIMINAR USUARIO -->
            <div class="">
            <?php 
                // include __DIR__. "/view/Administrador/Funciones/eliminar_Usuario_V.php";  
            ?>
            </div>
            <!-- MOSTRAR USUARIOS -->
            <div class="">
            <?php 
                // include __DIR__. "/view/Administrador/Funciones/mostrar_Usuarios_V.php";  
            ?> 
            </div>
            <!-- MODIFICAR USUARIOS -->
            <div class="">

            </div>
            
        </div>

 
    </div>
   

</body>
</html>
