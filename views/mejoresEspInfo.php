<!DOCTYPE html>
<html lang="en">

<?php
include("dataBase.php");
session_start();
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Salud Agenda</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptTamanoLetras.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">Salud Agenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservacion.php">Reservaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="historial.php">Historial</a></li>

                    <?php if (isset($_SESSION['usuario'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar sesión</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="accessibility-bar">
        <button class="btn-size" id="btn-small" onclick="setFontSize('small')">A</button>
        <button class="btn-size" id="btn-medium" onclick="setFontSize('medium')">A</button>
        <button class="btn-size" id="btn-large" onclick="setFontSize('large')">A</button>
    </div>
    <!-- Page Content-->

    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cardiavant.com/wp-content/uploads/consulta-cardiologica.jpg" alt="Especialista 1">
            </div>
            <div class="carousel-item">
                <img src="https://www.cadenaderadios.com.ar/multimedia/imagenes/fotos/2024-04-09/167779_grande.jpg" alt="Especialista 2">
            </div>
            <div class="carousel-item">
                <img src="https://www.imagenesdentales.com/wp-content/uploads/2018/02/imagenes-03.jpg" alt="Especialista 3">
            </div>
            <div class="carousel-item">
                <img src="https://www.colegiodentistas.org/wp-content/uploads/2023/03/PAGINA-WEB2.png" alt="Especialista 4">
            </div>
            <div class="carousel-item">
                <img src="https://www.esneca.lat/wp-content/uploads/que-hace-un-dermatologo.jpg" alt="Especialista 5">
            </div>
        </div>
        <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
        <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
    </div>

    <h1>Información de los Mejores Especialistas</h1>
    <div class="specialist-info">
        <h2>Dr. Juan Pérez</h2>
        <p>Especialista en Ginecología con más de 20 años de experiencia.</p>
        <h2>Dra. María López</h2>
        <p>Especialista en Psicología reconocida a nivel internacional.</p>
        <h2>Dr. Carlos García</h2>
        <p>Especialista en Geriatría con un enfoque en medicina preventiva.</p>
        <h2>Dra. Julian Bonilla</h2>
        <p>Especialista en Odontologíá con un enfoque en blanqueamiento y tratamiento de caries.</p>
    </div>



    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script>
    let currentIndex = 0;
    let interval;

    function showSlide(index) {
        const slides = document.querySelectorAll('.carousel-item');
        if (index >= slides.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = slides.length - 1;
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * 100;
        document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === currentIndex);
        });
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
        resetInterval();
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
        resetInterval();
    }

    function startCarousel() {
        interval = setInterval(nextSlide, 4000); 
    }

    function stopCarousel() {
        clearInterval(interval);
    }

    function resetInterval() {
        stopCarousel();
        startCarousel();
    }

    document.addEventListener('DOMContentLoaded', () => {
        showSlide(currentIndex);
        startCarousel();
    });

    document.querySelector('.carousel').addEventListener('mouseenter', stopCarousel);
    document.querySelector('.carousel').addEventListener('mouseleave', startCarousel);
</script>


<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .carousel {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 2s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .specialist-info {
            padding: 20px;
        }
    </style>


</body>

</html>