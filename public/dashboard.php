<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../index.php');
        exit;
    }

    $nombre = $_SESSION['usuario']['nombre'];
    $vista = $_GET['view'] ?? 'registrar';
    // Sanitizar el parámetro para evitar ataques de traversal
    $vista = basename($vista);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="dashboard">
    <aside class="sidebar">
        <div class="logo-container">
            <img src="img/LOGO.jpg" alt="Logo" class="logo" style="max-width: 120px; display: block; margin: 0 auto 20px;">
        </div>
        <h2>Panel de administración</h2>
        <nav>
            <ul>
                <li><a href="dashboard.php?view=registrar">Registrar Alumno</a></li>
                <li><a href="dashboard.php?view=listar">Listar Alumnos</a></li>
                <li><a href="dashboard.php?view=registrarPlantel">Registrar Plantel</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </aside>
    <main class="contenido">
        <?php
            $archivo = "views/{$vista}.php";
            if (file_exists($archivo)) {
                include $archivo;
            } else {
                echo "<p>Vista no encontrada</p>";
            }
        ?>
    </main>
</div>
</body>
</html>