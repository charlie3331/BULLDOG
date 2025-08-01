<?php
include 'db.php'; // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $tabla = ''; // Inicializa la variable para la tabla

    // Identifica qué formulario se envió
    if (isset($_POST['borrar_botella'])) {
        $tabla = 'botellas';
    } elseif (isset($_POST['borrar_trago'])) {
        $tabla = 'tragos';
    } elseif (isset($_POST['borrar_producto'])) {
        $tabla = 'productos';
    }

    // Si se identificó una tabla válida, realiza la eliminación
    if (!empty($tabla)) {
        $sql = "DELETE FROM $tabla WHERE nombre = '$nombre' LIMIT 1";

        if ($conn->query($sql) === TRUE) {
            echo "El primer registro con el nombre '$nombre' ha sido eliminado de la tabla '$tabla'.";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
    }

    $conn->close(); // Cierra la conexión
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Registros</title>
</head>
<body>
    <h1>Borrar Registros</h1>

    <!-- Formulario para botellas -->
    <h2>Borrar una Botella</h2>
    <form method="POST" action="">
        <label for="nombre_botella">Nombre de la botella:</label>
        <input type="text" id="nombre_botella" name="nombre" required>
        <button type="submit" name="borrar_botella">Borrar</button>
    </form>

    <!-- Formulario para tragos -->
    <h2>Borrar un Trago</h2>
    <form method="POST" action="">
        <label for="nombre_trago">Nombre del trago:</label>
        <input type="text" id="nombre_trago" name="nombre" required>
        <button type="submit" name="borrar_trago">Borrar</button>
    </form>

    <!-- Formulario para productos -->
    <h2>Borrar un Producto</h2>
    <form method="POST" action="">
        <label for="nombre_producto">Nombre del producto:</label>
        <input type="text" id="nombre_producto" name="nombre" required>
        <button type="submit" name="borrar_producto">Borrar</button>
    </form>
</body>
</html>
