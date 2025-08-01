<?php
include 'db.php'; // Incluye la conexión a la base de datos

// Inicializar mensajes
$messageProducto = "";
$messageTrago = "";
$messageBotella = "";

// Procesar el formulario de productos al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $nombre = $_POST['nombre'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $imagen = $_POST['imagen'] ?? ''; // Solo nombre de la imagen

    // Validar campos obligatorios
    if ($nombre && $tipo && $precio && $imagen) {
        $stmt = $conn->prepare("INSERT INTO productos (nombre, tipo, precio, imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $nombre, $tipo, $precio, $imagen);
        if ($stmt->execute()) {
            $messageProducto = "Producto añadido con éxito.";
        } else {
            $messageProducto = "Error al guardar el producto: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $messageProducto = "Todos los campos son obligatorios.";
    }
}

// Procesar el formulario de tragos al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_trago'])) {
    $nombreTrago = $_POST['nombre_trago'] ?? '';
    $litro = $_POST['litro'] ?? '';
    $medio = $_POST['medio'] ?? '';
    $copa = $_POST['copa'] ?? '';
    $imagenTrago = $_POST['imagen_trago'] ?? '';

    // Validar campos obligatorios
    if ($nombreTrago && $litro && $medio && $copa && $imagenTrago) {
        $stmt = $conn->prepare("INSERT INTO tragos (nombre, litro, medio, copa, imagen) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombreTrago, $litro, $medio, $copa, $imagenTrago);
        if ($stmt->execute()) {
            $messageTrago = "Trago añadido con éxito.";
        } else {
            $messageTrago = "Error al guardar el trago: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $messageTrago = "Todos los campos son obligatorios.";
    }
}

// Procesar el formulario de botellas al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_botella'])) {
    $nombreBotella = $_POST['nombre_botella'] ?? '';
    $copaBotella = $_POST['copa_botella'] ?? '';
    $litroBotella = $_POST['litro_botella'] ?? '';
    $mililitrosBotella = $_POST['mililitros_botella'] ?? '';
    $tipoBotella = $_POST['tipo_botella'] ?? '';
    $imagenBotella = $_POST['imagen_botella'] ?? '';

    // Validar campos obligatorios
    if ($nombreBotella && $copaBotella && $litroBotella && $mililitrosBotella && $tipoBotella && $imagenBotella) {
        $stmt = $conn->prepare("INSERT INTO botellas (nombre, copa, litro, mililitros, tipo, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombreBotella, $copaBotella, $litroBotella, $mililitrosBotella, $tipoBotella, $imagenBotella);
        if ($stmt->execute()) {
            $messageBotella = "Botella añadida con éxito.";
        } else {
            $messageBotella = "Error al guardar la botella: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $messageBotella = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto, Trago y Botella</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Añadir Producto, Trago y Botella</h1>
    </header>
    <main>
        <div class="form-container">
            <!-- Formulario para productos -->
            <form action="anadirProducto.php" method="POST">
                <h2>Añadir Producto</h2>
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="tipo">Tipo de Producto:</label>
                <input type="text" id="tipo" name="tipo" required>

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" required>

                <label for="imagen">Nombre de la Imagen:</label>
                <input type="text" id="imagen" name="imagen" required>

                <button type="submit" name="add_product">Añadir Producto</button>
            </form>
            <p class="message"><?php echo $messageProducto; ?></p>

            <!-- Formulario para tragos -->
            <form action="anadirProducto.php" method="POST">
                <h2>Añadir Trago</h2>
                <label for="nombre_trago">Nombre del Trago:</label>
                <input type="text" id="nombre_trago" name="nombre_trago" required>

                <label for="litro">Litro:</label>
                <input type="text" id="litro" name="litro" required>

                <label for="medio">Medio Litro:</label>
                <input type="text" id="medio" name="medio" required>

                <label for="copa">Copa:</label>
                <input type="text" id="copa" name="copa" required>

                <label for="imagen_trago">Nombre de la Imagen:</label>
                <input type="text" id="imagen_trago" name="imagen_trago" required>

                <button type="submit" name="add_trago">Añadir Trago</button>
            </form>
            <p class="message"><?php echo $messageTrago; ?></p>

            <!-- Formulario para botellas -->
            <form action="anadirProducto.php" method="POST">
                <h2>Añadir Botella</h2>
                <label for="nombre_botella">Nombre de la Botella:</label>
                <input type="text" id="nombre_botella" name="nombre_botella" required>

                <label for="copa_botella">Copa:</label>
                <input type="text" id="copa_botella" name="copa_botella" required>

                <label for="litro_botella">Litro:</label>
                <input type="text" id="litro_botella" name="litro_botella" required>

                <label for="mililitros_botella">Mililitros:</label>
                <input type="text" id="mililitros_botella" name="mililitros_botella" required>

                <label for="tipo_botella">Tipo:</label>
                <input type="text" id="tipo_botella" name="tipo_botella" required>

                <label for="imagen_botella">Nombre de la Imagen:</label>
                <input type="text" id="imagen_botella" name="imagen_botella" required>

                <button type="submit" name="add_botella">Añadir Botella</button>
            </form>
            <p class="message"><?php echo $messageBotella; ?></p>
        </div>
    </main>
</body>
</html>
