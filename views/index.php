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
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="../views/assets/imagenindex.avif" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Reserva la cita medica para tu hijo</h1>
                <p>¡Bienvenidos a Salud Agenda, su sitio confiable para citas médicas pediátricas! Nos dedicamos a proporcionar un acceso rápido y fácil a atención médica de calidad para sus hijos. Con nuestra plataforma intuitiva, podrá programar citas con especialistas pediátricos en pocos pasos, asegurando que sus pequeños reciban la mejor atención posible sin largas esperas.¡Regístrese hoy!</p>
                <a class="btn btn-primary" href="registro.php"> Registrarse</a>
            </div>
        </div>

        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Agenda tu cita </h2>
                        <p class="card-text"> Reserva fácilmente una cita médica para tus hijos con tan solo unos clics. Nuestro sistema intuitivo te permitirá seleccionar el especialista adecuado, elegir el horario más conveniente y confirmar la cita de manera rápida y segura </p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="cita.php">Agenda tu Cita</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title"> Los mejores especialistas </h2>
                        <p class="card-text">

                            Especialistas altamente calificados y dedicados a brindar la mejor atención a tus hijos. Cada medico cuenta con una vasta experiencia en diversas áreas pediátricas, asegurando un cuidado integral y personalizado. Aquí podrás conocer más sobre su formación, áreas de expertise y horarios disponibles, para que elijas al profesional que mejor se adapte a las necesidades de tus pequeños
                        </p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="mejoresEspInfo.php">Mas Informacion</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title"> Disponibilidad 24/7</h2>
                        <p class="card-text">


                            Ofrecemos disponibilidad 24/7. No importa la hora ni el día, siempre podrás contar con nosotros para atender cualquier emergencia o necesidad médica. El equipo de especialistas están listo para brindarte el mejor servicio y cuidado, garantizando tranquilidad y bienestar para ti y tus pequeños.

                        </p>
                    </div>
                    <div class="card-footer"><a class="btn btn-primary btn-sm" href="disp247.php">Mas Informacion</a></div>
                </div>
            </div>
        </div>
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

</body>

</html>