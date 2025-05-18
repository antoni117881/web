<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Footer Simple</title>
<style>
    footer {
        background-color: #333;
        color: #f0f0f0;
        padding: 20px 15px;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
    .container {
        max-width: 1000px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }
    .footer-section {
        flex: 1 1 250px;
        min-width: 200px;
    }
    .footer-section h4 {
        margin-bottom: 10px;
        font-weight: bold;
    }
    .footer-section p, 
    .footer-section ul {
        margin: 0;
        padding: 0;
        list-style: none;
        line-height: 1.5;
    }
    .footer-section ul li {
        margin-bottom: 8px;
    }
    .footer-section a {
        color: #f0f0f0;
        text-decoration: none;
        transition: color 0.2s;
    }
    .footer-section a:hover {
        color: #1e90ff;
    }
    hr {
        border: none;
        border-top: 1px solid #555;
        margin: 20px 0 10px;
    }
    .copyright {
        text-align: center;
        font-size: 13px;
        color: #bbb;
    }

    /* Redes sociales simples con texto */
    .social-links a {
        margin-right: 12px;
        color: #f0f0f0;
        font-weight: bold;
        text-decoration: none;
    }
    .social-links a:hover {
        color: #1e90ff;
    }

    @media (max-width: 600px) {
        .container {
            flex-direction: column;
            gap: 30px;
        }
        .footer-section {
            min-width: auto;
        }
    }
</style>
</head>
<body>

<footer>
    <div class="container">
        <div class="footer-section">
            <h4>SuperSuela</h4>
            <p>Las mejores zapatillas para cada paso de tu vida. Calidad, estilo y comodidad en un solo lugar.</p>
        </div>
        <div class="footer-section">
            <h4>Enlaces</h4>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Tienda</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Síguenos</h4>
            <div class="social-links">
                <a href="#" aria-label="Facebook">Facebook</a>
                <a href="#" aria-label="Instagram">Instagram</a>
                <a href="#" aria-label="Twitter">Twitter</a>
                <a href="#" aria-label="WhatsApp">WhatsApp</a>
            </div>
        </div>
    </div>
    <hr />
    <div class="copyright">
        &copy; 2025 SuperSuela. Todos los derechos reservados.
    </div>
</footer>

</body>
</html>
