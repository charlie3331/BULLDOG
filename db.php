<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'chente';

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si hubo errores
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
