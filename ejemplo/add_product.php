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

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$costo = $_POST['costo'];
$disponibilidad = $_POST['disponibilidad'];
$color = $_POST['color'];

// Insertar nuevo producto
$sql = "INSERT INTO productos (nombre, costo, disponibilidad, color) 
        VALUES ('$nombre', $costo, $disponibilidad, '$color')";

if ($conexion->query($sql) === TRUE) {
    echo "Producto agregado exitosamente.";
} else {
    echo "Error al agregar producto: " . $conexion->error;
}

$conexion->close();
?>
