<?php

$server = "localhost";
$user = "root"; // Probablemente quisiste escribir "root" en lugar de "rot"
$pass = "";
$db = "chente";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa";
}

?>
