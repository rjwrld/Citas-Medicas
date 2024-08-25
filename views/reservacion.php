<!DOCTYPE html>
<html lang="en">

<?php
include("dataBase.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Salud Agenda</title>
    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptTamanoLetras.js" defer></script>
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
    <div class="accessibility-bar">
        <button class="btn-size" id="btn-small" onclick="setFontSize('small')">A</button>
        <button class="btn-size" id="btn-medium" onclick="setFontSize('medium')">A</button>
        <button class="btn-size" id="btn-large" onclick="setFontSize('large')">A</button>
    </div>

    <!-- Contenido Pagina-->
    <div class="container mt-custom">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center">¿Quieres realizarte una Revisión?</h1>
                    <section class="centered">
                        <p>¡Bienvenido a nuestro servicio de reserva de citas médicas en línea! En solo unos simples pasos, puedes asegurar tu consulta con nuestros profesionales de salud altamente calificados.</p>
                        <p>Para comenzar, simplemente selecciona la especialidad médica que necesitas, elige un horario disponible que se ajuste a tu agenda y completa algunos detalles básicos. ¡Reservar tu cita médica nunca ha sido tan fácil! Asegúrate de tener a mano tu información de contacto y detalles de seguro médico para un proceso aún más rápido.</p>
                    </section>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h1 class="text-center">Reserva de Citas Médicas</h1>
                                <form action="procesar_reserva.php" method="post" onsubmit="return validarFechaHora();">
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
                                            <option value="Geriatría">Geriatría</option>
                                            <option value="Dentista">Dentista</option>
                                            <option value="Psicología">Psicología</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="motivo">Motivo:</label>
                                        <textarea id="motivo" name="motivo" class="form-control" rows="4" placeholder="Detalles adicionales sobre tu cita" required></textarea>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block">Reservar cita</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validarFecha() {
            const fecha = new Date(document.getElementById('fecha').value);
            const diaSemana = fecha.getDay();
            const diasPermitidos = [1, 2, 3, 4, 5];

            if (!diasPermitidos.includes(diaSemana)) {
                alert("No se pueden hacer reservas en este día.");
                return false;
            }

            return true;
        }

        document.getElementById('formReserva').addEventListener('submit', function(event) {
            if (!validarFecha()) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>