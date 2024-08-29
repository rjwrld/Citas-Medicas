<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Salud Agenda</title>
    <link rel="icon" type="image/x-icon" href="/views/assets/favicon.ico" />
    <link href="../views/assets/boostrap/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../views/assets/css/styles.css">
    <script src="../controllers/scriptLogin.js" defer></script>
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservacion.php">Reservaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="historial.php">Historial</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesión</a></li>
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
            <h1 class="text-center mb-4">Noticias Recientes sobre Salud</h1>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">La Importancia de la Vacunación contra la Gripe</h5>
                    <p class="mb-1">La vacunación anual contra la gripe sigue siendo una de las mejores maneras de protegerse contra el virus de la influenza. Los expertos recomiendan la vacuna para todas las personas mayores de 6 meses.</p>
                    <small>Publicado el 29 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Beneficios de una Dieta Balanceada en la Prevención de Enfermedades</h5>
                    <p class="mb-1">Una dieta equilibrada puede reducir el riesgo de enfermedades crónicas como la diabetes tipo 2 y las enfermedades cardíacas. Incluir frutas, verduras y granos enteros es clave para una buena salud.</p>
                    <small>Publicado el 28 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Nuevas Directrices para el Manejo del Estrés</h5>
                    <p class="mb-1">Las nuevas directrices sugieren técnicas de manejo del estrés como la meditación y el ejercicio regular para mejorar la salud mental y física. Estas prácticas pueden reducir los niveles de ansiedad y depresión.</p>
                    <small>Publicado el 27 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Cómo la Hidratación Afecta tu Salud</h5>
                    <p class="mb-1">Mantenerse bien hidratado es esencial para el funcionamiento óptimo del cuerpo. La deshidratación puede causar problemas de salud como dolores de cabeza y fatiga.</p>
                    <small>Publicado el 26 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Avances en el Tratamiento del Cáncer de Mama</h5>
                    <p class="mb-1">Recientes investigaciones han mostrado avances significativos en el tratamiento del cáncer de mama, incluyendo nuevas terapias dirigidas y tratamientos personalizados.</p>
                    <small>Publicado el 25 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">La Importancia del Sueño en la Salud General</h5>
                    <p class="mb-1">Dormir entre 7 y 9 horas por noche es crucial para la salud general. La falta de sueño puede llevar a una serie de problemas de salud, incluyendo enfermedades cardiovasculares y problemas metabólicos.</p>
                    <small>Publicado el 24 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Estrategias para Mantener un Corazón Saludable</h5>
                    <p class="mb-1">Adoptar un estilo de vida saludable, que incluya una dieta baja en grasas saturadas y ejercicio regular, puede ayudar a mantener el corazón en buen estado.</p>
                    <small>Publicado el 23 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">La Importancia de los Exámenes Médicos Regulares</h5>
                    <p class="mb-1">Los exámenes médicos regulares son esenciales para la detección temprana de enfermedades y condiciones de salud. Realizar chequeos anuales puede ayudar a identificar problemas de salud antes de que se conviertan en problemas graves.</p>
                    <small>Publicado el 22 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Cómo Manejar la Diabetes Tipo 2</h5>
                    <p class="mb-1">Manejar la diabetes tipo 2 requiere un enfoque integral que incluya dieta, ejercicio y medicación. La educación y el monitoreo regular son fundamentales para mantener los niveles de azúcar en sangre bajo control.</p>
                    <small>Publicado el 21 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">El Impacto del Ejercicio en la Salud Mental</h5>
                    <p class="mb-1">El ejercicio regular no solo mejora la salud física, sino que también tiene beneficios significativos para la salud mental, incluyendo la reducción de los síntomas de depresión y ansiedad.</p>
                    <small>Publicado el 20 de agosto de 2024</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Tendencias en la Investigación sobre la Salud del Corazón</h5>
                    <p class="mb-1">Las investigaciones recientes están revelando nuevas estrategias para prevenir y tratar enfermedades cardíacas, incluyendo avances en la genética y la tecnología médica.</p>
                    <small>Publicado el 19 de agosto de 2024</small>
                </a>
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
