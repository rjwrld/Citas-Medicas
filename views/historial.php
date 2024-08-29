<!DOCTYPE html>
<html lang="en">

<?php
include("dataBase.php");
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario al login si no está logueado
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Salud Agenda</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../views/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptTamanoLetras.js" defer></script>
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
    <!-- Page Content-->
    <div class="container mt-custom">
        <div class="container px-5 my-5">
            <h1 class="text-center mb-4">Historial de Pacientes</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Reserva</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha de Cita</th>
                        <th scope="col">Hora de Cita</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Doctor Asignado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT c.idReserva, c.usuario, c.fechaCita, c.horaCita, c.especialidad, c.motivo, d.nombreCompleto AS doctorAsignado 
                            FROM citas c 
                            JOIN doctores d ON c.doctorAsignado = d.idDoctor 
                            WHERE c.usuario = ?";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $usuario);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['idReserva']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['usuario']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fechaCita']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['horaCita']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['especialidad']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['motivo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['doctorAsignado']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No se encontraron citas</td></tr>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
                </tbody>
            </table>
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
