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
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #1976d2 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            min-width: 320px;
            align-items: center;
        }
        .login-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.10);
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            padding: 0.8rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.2s;
            outline: none;
            width: 100%;
        }
        .login-container input:focus {
            border-color: #667eea;
        }
        .login-container button {
            background: linear-gradient(90deg, #667eea 0%, #1976d2 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            width: 100%;
        }
        .login-container button:hover {
            background: linear-gradient(90deg, #5a67d8 0%, #1976d2 100%);
            transform: translateY(-2px) scale(1.03);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }
        p[style] {
            text-align: center;
            margin-top: 1rem;
            font-size: 1rem;
            border-radius: 6px;
            background: #ffeaea;
            padding: 0.7rem 1rem;
            color: #e53e3e !important;
        }
    </style>
</head>
<body>
    <form method="POST" id="formLogin" class="login-container">
        <img src="public/img/LOGO.jpg" alt="Logo" class="login-logo">
        <h2>Iniciar sesión</h2>
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button id="btnLogin" type="submit">Iniciar Sesión</button>
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Error: credenciales inválidas o campos vacíos.</p>
        <?php endif; ?>
    </form>
    <script src="public/js/login.js"></script>
</body>
</html>
