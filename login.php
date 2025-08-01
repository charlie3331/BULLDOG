<?php
// Configuración de conexión
$server = "localhost";
$user = "root";
$pass = "";
$db = "chente";

$conexion = new mysqli($server, $user, $pass, $db);
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener datos
$usuario = trim($_POST['usuario']);
$clave = trim($_POST['clave']);

// Verificar credenciales
$sql = "SELECT Clave, Usuario FROM usuarios WHERE Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($clave_guardada, $nombre_usuario);

if ($stmt->fetch()) {
    if ($clave === $clave_guardada) {
        // Cerrar la consulta de SELECT
        $stmt->close();
        
        // Ahora inserta en la tabla 'logeado'
        $sql_insert = "INSERT INTO logeado (nombre) VALUES (?)";
        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bind_param("s", $nombre_usuario);
        $stmt_insert->execute();
        $stmt_insert->close();

        // Redirige con mensaje de éxito
        header("Location: mensaje3.php?status=success&mensaje=Bienvenido, $nombre_usuario.&redirect=index.html");
    } else {
        // Si la contraseña es incorrecta, redirige con error
        header("Location: mensaje3.php?status=error&mensaje=Usuario o contraseña incorrectos.&redirect=inicio_sesion.html");
    }
} else {
    // Si no se encuentra el usuario, redirige con error
    header("Location: mensaje3.php?status=error&mensaje=Usuario no encontrado.&redirect=inicio_sesion.html");
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
