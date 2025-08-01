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
            background: linear-gradient(135deg, #0e1461, #161f85, #3b49df, #5a6ef5);
            color: #fff;
            text-align: center;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
        }
        h1 {
            font-size: 24px;
            color: #161f85;
            margin-bottom: 15px;
        }
        .message {
            font-size: 18px;
            color: #333;
            margin: 10px 0 20px;
        }
        .redirect {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(to right, #161f85, #3b49df);
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $status = $_GET['status'] ?? 'info';
        $mensaje = $_GET['mensaje'] ?? 'Operación realizada.';
        $redirect = $_GET['redirect'] ?? 'index.html';
        ?>
        <h1 class="<?php echo htmlspecialchars($status); ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </h1>
        <p class="redirect">Serás redirigido en 3 segundos...</p>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "<?php echo htmlspecialchars($redirect); ?>";
        }, 3000);
    </script>
</body>
</html>