<?php
session_start(); // Inicia la sesión

// Destruye la sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión en sí

// Redirige al formulario de inicio de sesión
header("Location: login.html");
exit();
?>