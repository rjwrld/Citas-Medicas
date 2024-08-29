<?php
 
$servername = "localhost";
$username = "root";
$password = "kendall22";
$database = "citasMedicas";
 
$conn = new mysqli($servername,$username, $password, $database,"3306");
 
if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
   
}

CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_paciente VARCHAR(255) NOT NULL,
    fecha_pago DATE NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    metodo_pago ENUM('Efectivo', 'Tarjeta de Crédito', 'Tarjeta de Débito', 'Transferencia Bancaria') NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
 
?>





