<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Navegación</title>
    <style>
        /* Estilo para el header */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        header button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        header button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    $server = "localhost";
    $user = "root"; // Cambia según tu configuración
    $pass = "";
    $db = "chente";

    // Conexión a la base de datos
    $conexion = new mysqli($server, $user, $pass, $db);

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $logged_in_user = null;

    // Verificar si hay usuario logeado
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];

        $sql = "SELECT Logeado FROM usuarios WHERE Usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['Logeado'] == true) {
                $logged_in_user = $usuario;
            }
        }
        $stmt->close();
    }

    $conexion->close();
    ?>

    <header>
        <?php if ($logged_in_user): ?>
            <!-- Si el usuario está logeado, mostrar solo los botones de "Cuenta" y "Carrito" -->
            <p>Bienvenido, <strong><?php echo htmlspecialchars($logged_in_user); ?></strong></p>
            <button onclick="location.href='cuenta.php'">Cuenta</button>
            <button onclick="location.href='cart.html'">Carrito</button>
            <form action="logout.php" method="POST" style="display: inline;">
                <button type="submit">Cerrar Sesión</button>
            </form>
        <?php else: ?>
            <!-- Si el usuario no está logeado, mostrar los botones de "Ingresar" y "Crear Cuenta" -->
            <button onclick="location.href='login.html'">Ingresa</button>
            <button onclick="location.href='crearCuenta.html'">Crear Cuenta</button>
        <?php endif; ?>
    </header>

</body>
</html>
