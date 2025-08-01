<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "chente";

$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener productos
$sql = "SELECT nombre, costo, disponibilidad, color FROM productos";
$result = $conexion->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Retornar los productos en formato JSON
echo json_encode($productos);

$conexion->close();
?>
