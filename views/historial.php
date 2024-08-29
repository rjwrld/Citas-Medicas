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
    <title>Historial de Pacientes - Salud Agenda</title>
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
                    <li class="nav-item"><a class="nav-link" href="pagos.php">Pagos y Facturación</a></li>
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

    <div class="container mt-custom">
        <div class="container px-5 my-5">
            <h1 class="text-center mb-4">Historial de Pacientes</h1>

            <div class="row mb-4">
                <div class="col-md-6 offset-md-3">
                    <input type="text" id="buscarPaciente" class="form-control" placeholder="Buscar paciente por nombre o ID" onkeyup="filtrarPacientes();">
                </div>
            </div>

            <table class="table table-striped" id="tablaPacientes">
                <thead>
                    <tr>
                        <th scope="col">ID Paciente</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Última Cita</th>
                        <th scope="col">Diagnóstico</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM pacientes";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id_paciente']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fecha_nacimiento']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ultima_cita']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['diagnostico']) . "</td>";
                        echo "<td>
                                <a href='ver_detalles.php?id=" . $row['id_paciente'] . "' class='btn btn-sm btn-info'>Ver Detalles</a>
                                <a href='editar_paciente.php?id=" . $row['id_paciente'] . "' class='btn btn-sm btn-warning'>Editar</a>
                                <a href='eliminar_paciente.php?id=" . $row['id_paciente'] . "' class='btn btn-sm btn-danger'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function filtrarPacientes() {
            const input = document.getElementById("buscarPaciente");
            const filter = input.value.toLowerCase();
            const table = document.getElementById("tablaPacientes");
            const tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName("td");
                let match = false;
                for (let j = 0; j < td.length - 1; j++) {
                    if (td[j]) {
                        if (td[j].innerHTML.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>

</html>
