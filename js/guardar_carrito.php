<?php
// Asegúrate de que el servidor pueda recibir la solicitud POST con datos JSON
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

// Verifica si la conexión es exitosa
if ($conexion->connect_error) {
    die(json_encode(["success" => false, "message" => "Error de conexión: " . $conexion->connect_error]));
}

// Obtener los datos enviados desde JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// Verificar si los productos existen
if (isset($data['productos'])) {
    $productos = $data['productos'];

    // Guardar los productos en la base de datos
    foreach ($productos as $producto) {
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];

        // Preparar la consulta SQL para insertar el producto en la base de datos
        $query = "INSERT INTO carrito (nombre_producto, precio) VALUES (?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sd", $nombre, $precio);  // 's' para string, 'd' para double

        if (!$stmt->execute()) {
            // Si hay algún error al guardar un producto
            echo json_encode(["success" => false, "message" => "Error al guardar los productos."]);
            exit();
        }
    }

    // Responder con éxito
    echo json_encode(["success" => true, "message" => "Productos guardados correctamente"]);
} else {
    // Si no se recibieron productos
    echo json_encode(["success" => false, "message" => "No se recibieron productos"]);
}

// Cerrar la conexión
$conexion->close();
?>
