<?php
include("dataBase.php");
session_start(); 

$usuario = $_POST['usuario'];
$contrasena_ingresada = $_POST['contrasena'];

$query = "SELECT Contrasena FROM usuario WHERE Usuario = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param('s', $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row['Contrasena'];

    if (password_verify($contrasena_ingresada, $stored_password)) {
        $_SESSION['usuario'] = $usuario;
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "errors" => ["Usuario o contraseña incorrectos."]]);
    }
} else {
    echo json_encode(["success" => false, "errors" => ["Usuario o contraseña incorrectos."]]);
}

$stmt->close();
$conn->close();
?>
