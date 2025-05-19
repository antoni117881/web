<?php
    // Asegurarnos de que el archivo solo se incluye una vez
    if (!defined('INCLUDED')) {
        define('INCLUDED', true);
?>

<html>
    <head>
        <style>
            .body{
                background: linear-gradient(90deg,rgb(82, 78, 215),rgb(71, 114, 232), #86a8e7);
                animation: moveGradient 5s ease-in-out infinite alternate;
                
            }
            .carouselExample {
                width: 100%;
                height: 250px;
            }
            .carousel-item img {
                 width: 100%; /* Asegura que la imagen ocupe todo el ancho */
                 height: 700px; /* Ajusta la altura aquí según tus necesidades */
                
             }
        </style>
        <title>SuperSuela Menu</title>
      
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS (opcional, necesario para componentes interactivos) -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> -->

    </head>
    <body class="body">

    
        <div class="">
            <?php
            include __DIR__. "/view/header.php";
            ?>
        </div>
        <div class="container-mt-5">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://revistadiners.com.co/wp-content/uploads/2019/05/nike_800x669.jpg" class="d-block w-100" alt="Nike 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://okdiario.com/look/img/2023/02/23/a559819c-b655-466b-9d02-6a7b0010f38f.jpg" class="d-block w-100" alt="Nike 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://media.revistagq.com/photos/5ea0065a8368a10008af32c2/1:1/w_1280%2cc_limit/zapatilla-running-nike.jpg" class="d-block w-100" alt="Nike 3">
                        </div>
                    </div>
                    
                    <!-- Controles del carrusel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        <div class="Container-Menu"> 
            <div >
                <h2>Nuestros Productos  </h2>
               <?php include __DIR__."/view/Productos/card_productos.php"; 
               ?>
            </div>  
            <h1>Productos en Oferta</h1>
            
            <div class="Oferts" > 
            <?php 
            include __DIR__."/view/Productos/card_productos.php"; 
            ?>
           
            </div>
            <!-- https://revistadiners.com.co/wp-content/uploads/2019/05/nike_800x669.jpg
            https://okdiario.com/look/img/2023/02/23/a559819c-b655-466b-9d02-6a7b0010f38f.jpg
            https://media.revistagq.com/photos/5ea0065a8368a10008af32c2/1:1/w_1280%2cc_limit/zapatilla-running-nike.jpg -->

            

           <?php
            include __DIR__."/view/footer.php"; 
            ?>
        
            </div>
        
    </body>
</html>
<?php
    }
?>