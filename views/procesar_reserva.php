<?php
include("dataBase.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$hora = isset($_POST['hora']) ? $_POST['hora'] : '';
$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : ''; // Nuevo campo

$sqlDoctor = "SELECT * FROM doctores WHERE especialidad = '$especialidad' ORDER BY RAND() LIMIT 1";
$resultDoctor = $conn->query($sqlDoctor);

if ($resultDoctor->num_rows > 0) {
    $doctor = $resultDoctor->fetch_assoc();
    $doctorAsignado = $doctor['idDoctor'];
    $nombreDoctor = $doctor['nombreCompleto']; 

    $sqlInsertCita = "INSERT INTO citas (usuario, fechaCita, horaCita, especialidad, motivo, doctorAsignado) 
                      VALUES ('" . $_SESSION['usuario'] . "', '$fecha', '$hora', '$especialidad', '$motivo', $doctorAsignado)";
    
    if ($conn->query($sqlInsertCita) === TRUE) {
        $_SESSION['cita_detalles'] = [
            'nombre' => $nombre,
            'fecha' => $fecha,
            'hora' => $hora,
            'especialidad' => $especialidad,
            'motivo' => $motivo, // Añadir motivo
            'doctor_nombre_completo' => $nombreDoctor 
        ];
        header("Location: cita.php");
    } else {
        echo "Error: " . $sqlInsertCita . "<br>" . $conn->error;
    }
} else {
    echo "No hay doctores disponibles en esta especialidad.";
}

$conn->close();
?>
