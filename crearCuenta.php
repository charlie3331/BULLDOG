<?php
// Configuración de la conexión a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "chente";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$confirmar_clave = $_POST['confirmar_clave'];

// Validar que las contraseñas coincidan
if ($clave !== $confirmar_clave) {
    mostrarMensaje("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.", "crearCuenta.html");
    exit;
}

// Verificar si el usuario o correo ya existen
$sql_verificar = "SELECT * FROM usuarios WHERE Usuario = ? OR Correo = ?";
$stmt = $conexion->prepare($sql_verificar);
$stmt->bind_param("ss", $usuario, $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    mostrarMensaje("El usuario o el correo ya están registrados. Por favor, elige otros.", "crearCuenta.html");
    exit;
}

// Insertar el nuevo usuario en la base de datos
$sql_insertar = "INSERT INTO usuarios (Usuario, Correo, Clave) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql_insertar);
$stmt->bind_param("sss", $usuario, $correo, $clave);

if ($stmt->execute()) {
    mostrarMensaje("¡Felicidades, $usuario! Tu cuenta ha sido creada exitosamente.", "principal.php", 2);
} else {
    mostrarMensaje("Hubo un error al crear tu cuenta: " . $stmt->error, "crearCuenta.html");
}

// Cerrar conexión
$stmt->close();
$conexion->close();

// Función para mostrar mensajes y redirigir
function mostrarMensaje($mensaje, $redireccion, $segundos = 2) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Notificación</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .mensaje {
                text-align: center;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .mensaje h1 {
                color: #333;
                margin-bottom: 10px;
            }
            .mensaje p {
                color: #666;
            }
        </style>
        <meta http-equiv='refresh' content='$segundos;url=$redireccion'>
    </head>
    <body>
        <div class='mensaje'>
            <h1>Notificación</h1>
            <p>$mensaje</p>
            <p>Serás redirigido al menu </p>
        </div>
    </body>
    </html>";
}
?>
