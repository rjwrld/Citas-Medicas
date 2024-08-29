<?php
include("dataBase.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $cedula = $_POST['identificacion'];

    $errors = [];

    if (strlen($nombre) > 15) $errors[] = "El nombre no puede exceder los 15 caracteres.";
    if (strlen($apellidos) > 30) $errors[] = "Los apellidos no pueden exceder los 30 caracteres.";
    if (strlen($usuario) > 20) $errors[] = "El nombre de usuario no puede exceder los 20 caracteres.";
    if (strlen($contrasena) > 20) $errors[] = "La contraseña no puede exceder los 20 caracteres.";
    if (strlen($correo) > 50) $errors[] = "El correo electrónico no puede exceder los 50 caracteres.";
    if (strlen($telefono) > 8) $errors[] = "El teléfono no puede exceder los 8 dígitos.";
    if (strlen($cedula) > 9) $errors[] = "La identificación no puede exceder los 9 dígitos.";

    if (!empty($errors)) {
        echo json_encode(["success" => false, "errors" => $errors]);
        exit;
    }

    if (empty($nombre) || empty($apellidos) || empty($usuario) || empty($contrasena) || empty($correo) || empty($telefono) || empty($cedula)) {
        echo json_encode(["success" => false, "errors" => ["Por favor, completa todos los campos."]]);
        exit;
    }

    $check_query = "SELECT Usuario FROM usuario WHERE Usuario = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo json_encode(["success" => false, "errors" => ["El nombre de usuario ya existe."]]);
        $stmt->close();
        $conn->close();
        exit;
    }
    $stmt->close();

    $hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuario (Usuario, Nombre, Apellidos, Contrasena, Correo, Telefono, Cedula) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssis", $usuario, $nombre, $apellidos, $hashed_password, $correo, $telefono, $cedula);
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "errors" => ["Error en la ejecución: " . $stmt->error]]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "errors" => ["Error en la consulta: " . $conn->error]]);
    }

    $conn->close();
}
?>
