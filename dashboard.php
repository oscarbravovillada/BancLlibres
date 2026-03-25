
<?php
session_start();
include 'db/connection.php';

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// Consultas para estadísticas
$alumnos_count = $conn->query("SELECT COUNT(*) as total FROM alumnos")->fetch_assoc()['total'];
$libros_count = $conn->query("SELECT SUM(cantidad) as total FROM libros")->fetch_assoc()['total'];
$prestamos_count = $conn->query("SELECT COUNT(*) as total FROM prestamos WHERE estado='activo'")->fetch_assoc()['total'];
$devoluciones_count = $conn->query("SELECT COUNT(*) as total FROM historial WHERE fecha_devolucion_real > NOW() - INTERVAL 7 DAY")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Banc de Llibres</title>

    <style>
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f0f4f8;
        }

        .sidebar{
            position: fixed;
            top:0;
            left:0;
            width:220px;
            height:100%;
            background:#1e3a8a;
            color:white;
            display:flex;
            flex-direction:column;
            padding-top:20px;
        }

        .sidebar h2{
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            color:white;
            padding:15px 20px;
            text-decoration:none;
            display:block;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#3b82f6;
        }

        .main{
            margin-left:220px;
            padding:40px;
        }

        .card{
            background:white;
            border-radius:12px;
            padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            margin-bottom:20px;
        }

        h1{
            color:#1e3a8a;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Banc de Llibres</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="alumnos.php">Alumnos</a>
    <a href="libros.php">Libros</a>
    <a href="prestamos.php">Préstamos</a>
    <a href="devoluciones.php">Devoluciones</a>
    <a href="logout.php">Cerrar sesión</a>
</div>

<div class="main">
    <h1>Panel Principal</h1>

    <div class="card">
        <h3>Usuarios registrados</h3>
        <p><?php echo $alumnos_count; ?> alumnos activos</p>
    </div>

    <div class="card">
        <h3>Libros disponibles</h3>
        <p><?php echo $libros_count; ?> libros en inventario</p>
    </div>

    <div class="card">
        <h3>Préstamos activos</h3>
        <p><?php echo $prestamos_count; ?> préstamos en curso</p>
    </div>

    <div class="card">
        <h3>Devoluciones recientes</h3>
        <p><?php echo $devoluciones_count; ?> devoluciones en la última semana</p>
    </div>
</div>

</body>
</html>