<?php
include 'db/connection.php';

if(isset($_POST['crear'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $curso = $_POST['curso'];
    $grupo = $_POST['grupo'];

    $sql = "INSERT INTO alumnos (nombre, apellidos, curso, grupo)
            VALUES ('$nombre','$apellidos','$curso','$grupo')";
    $conn->query($sql);

    header("Location: alumnos.php");
    exit();
}

if(isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    $conn->query("DELETE FROM alumnos WHERE id=$id");
}



$result = $conn->query("SELECT * FROM alumnos");

?>


<!DOCTYPE html>
<html>
<head>
<title>Alumnos</title>
<style>
body{
font-family: Arial;
background:#f5f6fa;
}

.container{
width:90%;
margin:auto;
}

table{
width:100%;
background:white;
border-collapse: collapse;
}

th,td{
padding:10px;
border:1px solid #ddd;
}

form{
background:white;
padding:20px;
margin-bottom:20px;
}

input{
padding:8px;
margin:5px;
}

button{
padding:8px 15px;
background:#2f3640;
color:white;
border:none;
}
</style>
</head>

<body>

<div class="container">

<h2>Gestión de Alumnos</h2>

<form method="POST">
<input name="nombre" placeholder="Nombre" required>
<input name="apellidos" placeholder="Apellidos" required>
<input name="curso" placeholder="Curso" required>
<input name="grupo" placeholder="Grupo" required>

<button name="crear">Crear alumno</button>
</form>


<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Curso</th>
<th>Grupo</th>
<th>Acciones</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['apellidos']; ?></td>
<td><?php echo $row['curso']; ?></td>
<td><?php echo $row['grupo']; ?></td>

<td>
<a href="editar_alumno.php?id=<?php echo $row['id']; ?>">Editar</a>
|
<a href="?eliminar=<?php echo $row['id']; ?>">Eliminar</a>
</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>