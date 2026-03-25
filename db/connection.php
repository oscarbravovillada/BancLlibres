<?php
$servername = "localhost";
$username = "bancuser";
$password = "1234";
$dbname = "banc_libres";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
die("Error conexión: " . $conn->connect_error);
}
?>