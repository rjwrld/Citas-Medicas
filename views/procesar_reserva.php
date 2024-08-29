<?php
include("dataBase.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre = $_POST['nombre'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$hora = $_POST['hora'] ?? '';
$especialidad = $_POST['especialidad'] ?? '';
$motivo = $_POST['motivo'] ?? '';

try {
    $fechaCita = new DateTime($fecha);
    $horaCita = new DateTime($hora);

    $diaSemana = $fechaCita->format('N'); 
    $horaSeleccionada = (int) $horaCita->format('G'); 
    $minutoSeleccionado = (int) $horaCita->format('i'); 

    if ($diaSemana === 7) { 
        $_SESSION['error'] = "No se pueden hacer reservas los domingos.";
        header("Location: reservacion.php");
        exit();
    }

    if ($horaSeleccionada < 5 || $horaSeleccionada > 15 || ($horaSeleccionada === 15 && $minutoSeleccionado > 0)) {
        $_SESSION['error'] = "Las citas solo se pueden hacer entre las 5:00 AM y las 3:00 PM.";
        header("Location: reservacion.php");
        exit();
    }

    $sqlDoctor = "SELECT * FROM doctores WHERE especialidad = ? ORDER BY RAND() LIMIT 1";
    $stmtDoctor = $conn->prepare($sqlDoctor);
    $stmtDoctor->bind_param("s", $especialidad);
    $stmtDoctor->execute();
    $resultDoctor = $stmtDoctor->get_result();

    if ($resultDoctor->num_rows > 0) {
        $doctor = $resultDoctor->fetch_assoc();
        $doctorAsignado = $doctor['idDoctor'];
        $nombreDoctor = $doctor['nombreCompleto'];

        $sqlInsertCita = "INSERT INTO citas (usuario, fechaCita, horaCita, especialidad, motivo, doctorAsignado) 
                          VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsertCita = $conn->prepare($sqlInsertCita);
        $stmtInsertCita->bind_param("sssssi", $_SESSION['usuario'], $fecha, $hora, $especialidad, $motivo, $doctorAsignado);

        if ($stmtInsertCita->execute()) {
            $_SESSION['cita_detalles'] = [
                'nombre' => $nombre,
                'fecha' => $fecha,
                'hora' => $hora,
                'especialidad' => $especialidad,
                'motivo' => $motivo,
                'doctor_nombre_completo' => $nombreDoctor
            ];
            header("Location: cita.php");
        } else {
            $_SESSION['error'] = "Error: " . $stmtInsertCita->error;
            header("Location: reservacion.php");
        }
    } else {
        $_SESSION['error'] = "No hay doctores disponibles en esta especialidad.";
        header("Location: reservacion.php");
    }
} catch (Exception $e) {
    $_SESSION['error'] = "Error en la fecha/hora: " . $e->getMessage();
    header("Location: reservacion.php");
}

$conn->close();
?>
