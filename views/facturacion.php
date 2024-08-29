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
    <title>Pagos y Facturación - Salud Agenda</title>
    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptTamanoLetras.js" defer></script>
</head>

<body>
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
                    <li class="nav-item"><a class="nav-link" href="gestion_doctores.php">Gestión de Doctores</a></li>
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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center">Pagos y Facturación</h1>
                    <section class="centered">
                        <p>En esta sección puedes realizar los pagos de los pacientes y generar facturas por los servicios brindados. Asegúrate de registrar todos los detalles necesarios de las transacciones.</p>
                    </section>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h1 class="text-center">Registrar Pago</h1>
                                <form action="procesar_pago.php" method="post" onsubmit="return validarPago();">
                                    <div class="form-group">
                                        <label for="nombre_paciente">Nombre del Paciente:</label>
                                        <input type="text" id="nombre_paciente" name="nombre_paciente" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha de Pago:</label>
                                        <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="monto">Monto:</label>
                                        <input type="number" id="monto" name="monto" class="form-control" min="0" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="metodo_pago">Método de Pago:</label>
                                        <select id="metodo_pago" name="metodo_pago" class="form-control">
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                            <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                                            <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Detalles adicionales sobre el pago" required></textarea>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block">Registrar Pago</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <h2 class="text-center">Historial de Pagos</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Paciente</th>
                                            <th>Fecha de Pago</th>
                                            <th>Monto</th>
                                            <th>Método de Pago</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM pagos";
                                        $result = $conn->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['nombre_paciente']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['fecha_pago']) . "</td>";
                                            echo "<td>$" . number_format($row['monto'], 2) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['metodo_pago']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                                            echo "<td>
                                                <a href='editar_pago.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Editar</a>
                                                <a href='eliminar_pago.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Eliminar</a>
                                              </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validarPago() {
            const nombrePaciente = document.getElementById('nombre_paciente').value;
            const fechaPago = document.getElementById('fecha_pago').value;
            const monto = document.getElementById('monto').value;

            if (!nombrePaciente || !fechaPago || !monto) {
                alert("Por favor, completa todos los campos obligatorios.");
                return false;
            }

            if (monto <= 0) {
                alert("El monto debe ser mayor que cero.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
