<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "banc_libres";

$conn = new mysqli($servername, $username, $password, $dbname);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>