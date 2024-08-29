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

    <link rel="icon" type="image/x-icon" href="../views/assets/favicon.ico" />
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptRegistro.js" defer></script>
    <link href="../views/assets/css/styles.css" rel="stylesheet" />
    <script src="../controllers/scriptTamanoLetras.js" defer></script>
</head>

<body class="registro-page">

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
    <div class="container-center">
        <div class="content-wrapper">
            <div class="image-container">
                <img src="../views/assets/logo.png" alt="Logo">
            </div>
            <div class="form-container">
                <h1>Registro de Usuario</h1>
                <form id="registrationForm" action="registro_usuario_DB.php" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required><br><br>

                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required><br><br>

                    <label for="usuario">Nombre de usuario:</label>
                    <input type="text" id="usuario" name="usuario" required><br><br>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required><br><br>

                    <label for="repetir_contrasena">Repetir Contraseña:</label>
                    <input type="password" id="repetir_contrasena" name="repetir_contrasena" required><br><br>

                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" required><br><br>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required><br><br>

                    <label for="identificacion">Identificación:</label>
                    <input type="text" id="identificacion" name="identificacion" required><br><br>

                    <button type="submit" class="botones">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Salud Agenda 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>