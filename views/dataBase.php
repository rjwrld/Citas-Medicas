<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
$database = "citasMedicas";
 
$conn = new mysqli($servername,$username, $password, $database,"3306");
 
if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
   
}
 
?>





