<?php
// Configuración de la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "chente";

// Conectar a la base de datos
$conexion = new mysqli($server, $user, $pass, $db);
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Eliminar el usuario logueado de la tabla 'logeado'
$sql = "DELETE FROM logeado WHERE 1";  // Borra todo el registro del usuario logueado
if ($conexion->query($sql) === TRUE) {
    // Redirigir al inicio de sesión después de cerrar sesión
    header("Location: inicio_sesion.html");
} else {
    echo "Error al cerrar sesión: " . $conexion->error;
}

$conexion->close();
?>
