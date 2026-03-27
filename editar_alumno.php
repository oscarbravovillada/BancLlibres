<?php
include 'db/connection.php';
session_start();

$id = $_GET['id'];

// ACTUALIZAR
if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $curso = $_POST['curso'];
    $grupo = $_POST['grupo'];

    $sql = "UPDATE alumnos SET 
            nombre='$nombre',
            apellidos='$apellidos',
            curso='$curso',
            grupo='$grupo'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: alumnos.php");
    exit();
}


// OBTENER DATOS
$sql = "SELECT * FROM alumnos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar alumno</title>

<style>
body{
font-family: Arial;
background:#f5f6fa;
}

.container{
width:400px;
margin:auto;
background:white;
padding:20px;
margin-top:40px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

label{
display:block;
margin-top:10px;
font-weight:bold;
}

input{
width:100%;
padding:8px;
margin-top:5px;
}

button{
margin-top:15px;
padding:10px;
width:100%;
background:#2f3640;
color:white;
border:none;
cursor:pointer;
}
</style>

</head>

<body>

<div class="container">

<h2>Editar alumno</h2>

<form method="POST">

<label>Nombre</label>
<input name="nombre" value="<?php echo $row['nombre']; ?>" required>

<label>Apellidos</label>
<input name="apellidos" value="<?php echo $row['apellidos']; ?>" required>

<label>Curso</label>
<input name="curso" value="<?php echo $row['curso']; ?>" required>

<label>Grupo</label>
<input name="grupo" value="<?php echo $row['grupo']; ?>" required>

<button name="actualizar">Actualizar alumno</button>

</form>

</div>

</body>
</html>