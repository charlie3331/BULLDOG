<?php
session_start();

// Configuración de la conexión
$server = "localhost";
$user = "root";
$pass = "";
$db = "chente";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Cerrar sesión
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    // Actualizar estado de logeado a false
    $sql = "UPDATE usuarios SET Logeado = FALSE WHERE Usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->close();

    // Destruir la sesión
    session_destroy();
}

// Redirigir al login
header("Location: principal.php");
exit();
?>

