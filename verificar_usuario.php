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

// Verificar si hay un usuario logueado en la tabla 'logeado'
$sql = "SELECT * FROM logeado LIMIT 1"; // Esto solo trae el primer registro si existe
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Si hay un usuario logueado, redirigir a gola.html
    header("Location: gola.html");
    exit();  // Asegúrate de llamar exit para detener la ejecución posterior
} else {
    // Si no hay un usuario logueado, redirigir a inicio_sesion.html
    header("Location: inicio_sesion.html");
    exit();  // Detener la ejecución posterior
}

$conexion->close();
?>
