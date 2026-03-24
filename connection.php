<?php
$servername = "localhost";
$username = "root"; // o tu usuario MySQL
$password = "";     // tu contraseña MySQL
$dbname = "banc_libres";

$conn = new mysqli($servername, $username, $password, $dbname);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>