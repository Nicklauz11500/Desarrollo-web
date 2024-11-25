<?php
session_start(); // Inicia la sesión

// Configuración de la base de datos
$host = 'localhost'; // Cambia si es necesario
$db = 'sistema_autenticacion';
$user = 'tu_usuario'; // Cambia por tu usuario de MySQL
$pass = 'tu_contraseña'; // Cambia por tu contraseña de MySQL

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara y ejecuta la consulta para obtener el usuario
    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verifica si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verifica la contraseña
        if (password_verify($password, $hashed_password)) {
            // Almacena el nombre de usuario en la sesión
            $_SESSION['username'] = $username;
            header("Location: welcome.php"); // Redirige a la página de bienvenida
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}

$conn->close();
?>