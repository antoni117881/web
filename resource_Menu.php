<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SuperSuela Menu</title>
    <link rel="stylesheet" href="/web/css/common.css">
    <style>
        /* Carousel styles */
        .carousel-container {
            position: relative;
            width: 100%;
            height: 700px;
            overflow: hidden;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .carousel-slide {
            min-width: 100%;
            height: 100%;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .carousel-btn.prev {
            left: 20px;
        }

        .carousel-btn.next {
            right: 20px;
        }

        .carousel-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: white;
        }
    </style>
</head>
<body>
    <?php include __DIR__. "/view/header.php"; ?>
    <div class="carousel-container">
        <div class="carousel" id="myCarousel">
            <div class="carousel-slide">
                <img src="https://p.turbosquid.com/ts-thumb/e6/1wRyKa/FE/4/jpg/1637048474/1920x1080/fit_q87/359d2eb3ee25897dac3a071b20ecc80b747d661e/4.jpg" alt="Nike 1">
            </div>
            <div class="carousel-slide">
                <img src="https://motormania.com.mx/wp-content/uploads/2023/08/230802_PD_Sneaker_1920x1080px.jpg" alt="Nike 2">
            </div>
            <div class="carousel-slide">
                <img src="https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg" alt="Nike 3">
            </div>
        </div>
        <button class="carousel-btn prev" onclick="moveSlide(-1)">❮</button>
        <button class="carousel-btn next" onclick="moveSlide(1)">❯</button>
        <div class="carousel-dots" id="carouselDots"></div>
    </div>
    <script>
        let currentSlide = 0;
        const carousel = document.getElementById('myCarousel');
        const slides = document.querySelectorAll('.carousel-slide');
        const dotsContainer = document.getElementById('carouselDots');

        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'dot' + (index === 0 ? ' active' : '');
            dot.onclick = () => goToSlide(index);
            dotsContainer.appendChild(dot);
        });

        function updateDots() {
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.className = 'dot' + (index === currentSlide ? ' active' : '');
            });
        }

        function moveSlide(direction) {
            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
            updateDots();
        }

        // Auto-advance slides
        setInterval(() => moveSlide(1), 5000);
    </script>
        <div class="Container-Menu"> 
            <div >
                <h2>Nuestros Productos Destacados   </h2>
               <?php include __DIR__."/view/Productos/card_productos.php"; 
               ?>
            </div>  
           
            </div>
            </div>
        </div>
        <?php include __DIR__. "/view/footer.php"; ?>
</body>
</html>