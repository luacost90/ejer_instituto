<?php  
    session_start(); 
    
    if (isset($_SESSION['usuario'])) {
        header('Location: public/dashboard.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" id="formLogin">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button id="btnLogin" type="submit">Inicias Sesión</button>
    </form>

    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Error: credenciales inválidas o campos vacíos.</p>
    <?php endif; ?>

    <script src="public/js/login.js"></script>
</body>
</html>
