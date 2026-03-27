<?php
session_start();

// destruir todas las variables de sesión
$_SESSION = array();

// destruir la sesión
session_destroy();

// redirigir al login
header("Location: index.php");
exit();
?>