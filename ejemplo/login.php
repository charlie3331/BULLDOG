<?php
// Configuración de la conexión a la base de datos
$server = "localhost";
$user = "root"; // Cambia este valor si tu usuario de base datos es diferente
$pass = "";
$db = "chente";

// Crear conexión
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener los datos enviados desde el formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE Usuario = ? AND Clave = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $clave);
$stmt->execute();
$result = $stmt->get_result();

// Función para mostrar mensaje y redirigir
function mostrarMensaje($mensaje, $redireccion, $segundos = 5) {
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
            <p>Serás redirigido en $segundos segundos...</p>
        </div>
    </body>
    </html>";
}

// Validar si se encontró el usuario
if ($result->num_rows > 0) {
    // Actualizar el estado de 'Logeado' a true
    $sql_update = "UPDATE usuarios SET Logeado = TRUE WHERE Usuario = ?";
    $stmt_update = $conexion->prepare($sql_update);
    $stmt_update->bind_param("s", $usuario);
    $stmt_update->execute();

    // Crear una sesión PHP para el usuario
    session_start();
    $_SESSION['usuario'] = $usuario;

    mostrarMensaje("Inicio de sesión exitoso. ¡Bienvenido, $usuario!", "principal.php", 2);
} else {
    mostrarMensaje("Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.", "login.html", 5);
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
