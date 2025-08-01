<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #f7f7f7;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .message {
            font-size: 20px;
            margin: 20px 0;
        }
        .redirect {
            font-size: 16px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Obtener los parámetros de la URL
        $status = $_GET['status'] ?? 'info';
        $mensaje = $_GET['mensaje'] ?? 'Operación realizada.';
        $redirect = $_GET['redirect'] ?? 'index.html';
        $username = $_GET['username'] ?? '';  // Suponiendo que el nombre de usuario viene en la URL

        // Si hay un nombre de usuario, inserta en la base de datos
        if ($username) {
            // Conexión a la base de datos
            $servername = "localhost";
            $username_db = "root";  
            $password_db = "";      
            $dbname = "chente";  

            // Crear conexión
            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            
            $sql = "INSERT INTO logeado (nombre) VALUES ('$username')";

            if ($conn->query($sql) === TRUE) {
                echo "<h1 class='success'>$mensaje</h1>";
            } else {
                echo "<h1 class='error'>Error al registrar: " . $conn->error . "</h1>";
            }

            // Cerrar la conexión
            $conn->close();
        } else {
            echo "<h1 class='error'>No se ha proporcionado un nombre de usuario.</h1>";
        }
        ?>
        <p class="redirect">Serás redirigido en 3 segundos...</p>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "<?php echo htmlspecialchars($redirect); ?>";
        }, 3000);
    </script>
</body>
</html>
