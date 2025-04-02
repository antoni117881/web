<?php
    // Asegurarnos de que el archivo solo se incluye una vez
    if (!defined('INCLUDED')) {
        define('INCLUDED', true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SuperSuela Menu</title>
        <link rel="stylesheet" href="StylesResource.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (opcional, necesario para componentes interactivos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<style>
        /* Ajuste del tamaño del carrusel */
        .carousel-item img {
            max-width: 100%; /* Ajusta el ancho */
            height: 700px; /* Altura fija */
            /* object-fit: cover; /* Recorta sin deformar */
            margin: auto;
        }
    </style>
    </head>
    <body>
        <div class="">
            <?php
            include __DIR__. "/view/header.php";
            ?>
        </div>
        <div class="Container-Menu"> 
            <div >
                <h2>Productos  aa</h2>
                
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

            <div class="container mt-5">
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

            <footer class="bg-dark text-light py-4 mt-5">
                <div class="container">
                    <div class="row">
                        <!-- Logo y descripción -->
                        <div class="col-md-4">
                            <h4 class="fw-bold">SuperSuela</h4>
                            <p>Las mejores zapatillas para cada paso de tu vida. Calidad, estilo y comodidad en un solo lugar.</p>
                        </div>

                        <!-- Enlaces rápidos -->
                        <div class="col-md-4">
                            <h5>Enlaces</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-light text-decoration-none">Inicio</a></li>
                                <li><a href="#" class="text-light text-decoration-none">Tienda</a></li>
                                <li><a href="#" class="text-light text-decoration-none">Ofertas</a></li>
                                <li><a href="#" class="text-light text-decoration-none">Contacto</a></li>
                            </ul>
                        </div>

                        <!-- Redes sociales -->
                        <div class="col-md-4">
                            <h5>Síguenos</h5>
                            <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-light"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    <!-- Línea divisoria -->
                    <hr class="mt-4">

                    <!-- Derechos reservados -->
                    <div class="text-center">
                        <p class="mb-0">&copy; 2025 SuperSuela. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>


        
            </div>
        
    </body>
</html>
<?php
    }
?>