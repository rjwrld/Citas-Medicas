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

    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <link rel="stylesheet" href="./views/assets/css/style.css">
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />

</head>

<body>

    <!-- Navegador-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">Salud Agenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservacion.php">Reservaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="gestion.php">Gestión de Citas</a></li>
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


    <!-- Contenido Pagina-->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center">¿Quieres realizarte una Revision?</h1>
                <section class="centered">
                    <p>¡Bienvenido a nuestro servicio de reserva de citas médicas en línea! En solo unos simples pasos, puedes asegurar tu consulta con nuestros profesionales de salud altamente calificados.</p>
                    <p>Para comenzar, simplemente selecciona la especialidad médica que necesitas, elige un horario disponible que se ajuste a tu agenda y completa algunos detalles básicos. ¡Reservar tu cita médica nunca ha sido tan fácil! Asegúrate de tener a mano tu información de contacto y detalles de seguro médico para un proceso aún más rápido.</p>
                </section>



                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h1 class="text-center">Reserva de Citas Médicas</h1>
                            <form action="procesar_reserva.php" method="post">
                                <div class="form-group">
                                    <label for="nombre">Nombre completo:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha de la cita:</label>
                                    <input type="date" id="fecha" name="fecha" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="hora">Hora de la cita:</label>
                                    <input type="time" id="hora" name="hora" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="especialidad">Especialidad:</label>
                                    <select id="especialidad" name="especialidad" class="form-control">
                                        <option value="Consulta General">Consulta General</option>
                                        <option value="Ginecología">Ginecología</option>
                                        <option value="Gediatría">Gediatría</option>
                                        <option value="Dentista">Dentista</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Reservar cita</button>
                            </form>
                            <div class="mt-3 text-center">
                                <p class="text-success">Recibirás un correo de confirmación.</p>
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>