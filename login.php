<?php
session_start();
include 'db/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM usuarios WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
    
    
}

?>