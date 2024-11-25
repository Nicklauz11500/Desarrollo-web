<?php
session_start(); // Inicia la sesión

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirige al formulario de inicio de sesión si no está autenticado
    exit();
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['username']) . "!";
?>
<a href="logout.php">Cerrar sesión</a>