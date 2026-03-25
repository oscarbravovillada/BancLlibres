<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM usuarios 
        WHERE username='$user' 
        AND password='$pass'";

$result = $conn->query($sql);

if($result && $result->num_rows > 0){
    $_SESSION['username'] = $user;
    header("Location: dashboard.php");
    exit();
}else{
    $error = "Usuario o contraseña incorrectos";
}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
body{
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#0f172a,#1e3a8a);
color:white;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
background:rgba(255,255,255,0.05);
padding:30px;
border-radius:10px;
}

input{
display:block;
width:250px;
margin:10px 0;
padding:10px;
border:none;
border-radius:6px;
}

button{
width:100%;
padding:10px;
background:#3b82f6;
border:none;
color:white;
border-radius:6px;
cursor:pointer;
}

.error{
color:#ff6b6b;
}
</style>
</head>

<body>

<div class="box">
<h2>Iniciar sesión</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
<input type="text" name="username" placeholder="Usuario" required>
<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit">Entrar</button>
</form>

</div>

</body>
</html>