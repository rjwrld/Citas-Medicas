<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['cita_detalles'])) {
    header("Location: reservacion.php");
    exit();
}

$citaDetalles = $_SESSION['cita_detalles'];
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detalles de la Cita</title>
    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
    <div class="container mt-custom">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="details-container">
                    <h1 class="text-center">Detalles de la Cita</h1>
                    <section class="centered">
                        <p><i class="bi bi-person icon"></i><strong>Nombre:</strong> <?php echo htmlspecialchars($citaDetalles['nombre']); ?></p>
                        <p><i class="bi bi-calendar icon"></i><strong>Fecha:</strong> <?php echo htmlspecialchars($citaDetalles['fecha']); ?></p>
                        <p><i class="bi bi-clock icon"></i><strong>Hora:</strong> <?php echo htmlspecialchars($citaDetalles['hora']); ?></p>
                        <p><i class="bi bi-briefcase icon"></i><strong>Especialidad:</strong> <?php echo htmlspecialchars($citaDetalles['especialidad']); ?></p>
                        <p><i class="bi bi-person-check icon"></i><strong>Doctor Asignado:</strong> <?php echo htmlspecialchars($citaDetalles['doctor_nombre_completo']); ?></p>
                        <p><i class="bi bi-clipboard icon"></i><strong>Motivo:</strong> <?php echo htmlspecialchars($citaDetalles['motivo']); ?></p>
                        <p>¡Gracias por usar nuestro servicio de reserva de citas en línea!</p>
                        <a href="reservacion.php" class="btn-reserve">Reservar otra cita</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>
    <style>
        .details-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }

        .details-container h1 {
            color: #12229d;
            margin-bottom: 1rem;
        }

        .details-container p {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .details-container .btn-reserve {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #ffffff;
            background-color: #12229d;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 1rem;
        }

        .details-container .btn-reserve:hover {
            background-color: #0a1a7d;
        }

        .icon {
            margin-right: 0.5rem;
            color: #12229d;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>