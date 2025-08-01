<?php
include 'db.php'; // Incluye la conexión a la base de datos

// Consulta los productos desde la base de datos
$sqlProductos = "SELECT nombre, tipo, precio, imagen FROM productos";
$resultProductos = $conn->query($sqlProductos);

// Consulta los tragos desde la base de datos
$sqlTragos = "SELECT nombre, litro, medio, copa, imagen FROM tragos";
$resultTragos = $conn->query($sqlTragos);

// Consulta las botellas desde la base de datos
$sqlBotellas = "SELECT nombre, copa, litro, tipo, imagen FROM botellas";
$resultBotellas = $conn->query($sqlBotellas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Hind:wght@400;600&display=swap" rel="stylesheet">
    <title>Menú de Productos, Tragos y Botellas</title>
    <link rel="stylesheet" href="prueba.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Hind:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="css/whats.css">
    <link rel="stylesheet" href="css/letras.css">
    <script src="js/app3.js" async></script>
    <script>
        // Función para manejar el clic en el botón y mostrar información en la consola
        function mostrarInfoProducto(button) {
            const nombre = button.getAttribute('data-nombre');
            const imagen = button.getAttribute('data-imagen');
            const precio = button.getAttribute('data-precio');
            console.log(`Producto: ${nombre}, Imagen: ${imagen}, Precio: $${precio}`);
            agregarItemAlCarrito2(nombre, precio, imagen);

            hacerVisibleCarrito();
        }
    </script>
</head>
<body>
<header>
    <a href="index.html">
        <img src="imagenes/srpersonalizador.png" alt="Logo" class="logo" id="logo">
    </a>
    <ul class="contactanos">
        <a href="menudinamico.php">MENU</a>
        <a href="nosotros.html">SOBRE NOSOTROS</a>
    </ul>
    <h1><a href="index.html">BULLDOG</a></h1>
    <ul class="contactanos">
        <a href="index.html">INICIO</a>
        <a href="contacto.html">CONTACTANOS</a>
       
    </ul>
</header>

<div id="icono-carrito">
        🛒
    </div>

    <div class="carrito" id="carrito">
        <div class="header-carrito">
            <h2>Tu Carrito</h2>
            <button id="cerrar-carrito" class="btn-cerrar">
                &#10005; 
            </button>
        </div>

        <div class="carrito-items">

        </div>

        <div class="carrito-total">
            <div class="fila">
                <strong>Total</strong>
                <span class="carrito-precio-total">
                    $0,00
                </span>
            </div>
            <div class="descuento">
                <input type="text" id="input-descuento" placeholder="Código de descuento" class="input-descuento" />
                <button id="aplicar-descuento" class="btn-aplicar-descuento">
                    Aplicar
                </button>
            </div>
            <div id="mensaje-descuento" class="mensaje-descuento"></div>
            <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button>

        </div>
    </div>

    <div id="whatsapp-float" class="whatsapp-float">
        <a href="https://wa.me/524499284869" target="_blank" aria-label="WhatsApp">
            <i class='bx bxl-whatsapp'></i>
        </a>
    </div>

<main>
    <section>
        <h2 class="titulo-comentarios">NUESTRO MENU DE BEBIDAS</h2>
        <section class="menu-principal">
            <h2 class="titulo-menu">Explora Nuestro Menú</h2>
            <div class="categorias-menu">
                <a href="#conteCoct" class="categoria-titulo-item">
                    <div class="icono-categoria">🍹</div>
                    <p>Cócteles</p>
                </a>
                <a href="#conteTrag" class="categoria-titulo-item">
                    <div class="icono-categoria">🥃</div>
                    <p>Tragos</p>
                </a>
                <a href="#conteBot" class="categoria-titulo-item">
                    <div class="icono-categoria">🍾</div>
                    <p>Botellas</p>
                </a>
                <a href="#conteCerv" class="categoria-titulo-item">
                    <div class="icono-categoria">🍺</div>
                    <p>Cervezas</p>
                </a>
                <a href="#conteComida" class="categoria-titulo-item">
                    <div class="icono-categoria">🍔</div>
                    <p>Comida</p>
                </a>
                <a href="#conteSin" class="categoria-titulo-item">
                    <div class="icono-categoria">🥤</div>
                    <p>Sin Alcohol</p>
                </a>
            </div>
        </section>

        <!-- Cocteles Section -->
        <section>
            <h2 class="titulo-comentarios" id="conteCoct">Cocteles</h2>
            <?php
            $productosPorTipo = [
                'autor' => [],
                'margarita' => []
            ];

            if ($resultProductos->num_rows > 0) {
                while ($row = $resultProductos->fetch_assoc()) {
                    if (array_key_exists($row['tipo'], $productosPorTipo)) {
                        $productosPorTipo[$row['tipo']][] = $row;
                    }
                }
            }

            foreach ($productosPorTipo as $tipo => $productos) :
            ?>
                <h3 class="categorias"><?php echo $tipo; ?></h3>
                <div class="menu-container">
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $producto): ?>
                            <div class="product-card">
                                <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                                <h2><?php echo $producto['nombre']; ?></h2>
                                <p>Tipo: <?php echo $producto['tipo']; ?></p>
                                <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                                <br>
                                <button class="boton-agregar" 
                                        data-nombre="<?php echo $producto['nombre']; ?>" 
                                        data-imagen="<?php echo $producto['imagen']; ?>" 
                                        data-precio="<?php echo $producto['precio']; ?>" 
                                        onclick="mostrarInfoProducto(this)">
                                    AGREGAR PRODUCTO
                                </button>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay productos disponibles para <?php echo $tipo; ?>.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Tragos Section -->
        <section>
    <h2 class="titulo-comentarios" id="conteTrag">Tragos</h2>
    <?php if ($resultTragos->num_rows > 0): ?>
        <div class="menu-container">
            <?php while ($row = $resultTragos->fetch_assoc()): ?>
                <div class="product-card">
                    <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
                    <h2><?php echo $row['nombre']; ?></h2>
                    <p>Litro: <?php echo $row['litro']; ?></p>
                    <p>Medio: <?php echo $row['medio']; ?></p>
                    <p>Copa: <?php echo $row['copa']; ?> </p>
                    <br>
                    
                    <!-- Botón para agregar litro con su precio -->
                    <button class="boton-agregar" 
                            data-nombre="<?php echo $row['nombre']; ?>" 
                            data-imagen="<?php echo $row['imagen']; ?>" 
                            data-precio="<?php echo $row['litro']; ?>" 
                            onclick="mostrarInfoProducto(this)">
                        AGREGAR LITRO 
                    </button>
                    
                    <!-- Botón para agregar medio con su precio -->
                    <button class="boton-agregar" 
                            data-nombre="<?php echo $row['nombre']; ?>" 
                            data-imagen="<?php echo $row['imagen']; ?>" 
                            data-precio="<?php echo $row['medio']; ?>" 
                            onclick="mostrarInfoProducto(this)">
                        AGREGAR MEDIO
                    </button>
                    
                    <!-- Botón para agregar copa con su precio -->
                    <button class="boton-agregar" 
                            data-nombre="<?php echo $row['nombre']; ?>" 
                            data-imagen="<?php echo $row['imagen']; ?>" 
                            data-precio="<?php echo $row['copa']; ?>" 
                            onclick="mostrarInfoProducto(this)">
                        AGREGAR COPA
                    </button>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No hay tragos disponibles.</p>
    <?php endif; ?>
</section>


        <!-- Botellas Section -->
        <section>
            <h2 class="titulo-comentarios" id="conteBot">Botellas</h2>
            <?php if ($resultBotellas->num_rows > 0): ?>
                <div class="menu-container">
                    <?php while ($row = $resultBotellas->fetch_assoc()): ?>
                        <div class="product-card">
                            <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
                            <h2><?php echo $row['nombre']; ?></h2>
                            <p>Copa: <?php echo $row['copa']; ?> </p>
                            <p>Litro: <?php echo $row['litro']; ?></p>
                            <p>Tipo: <?php echo $row['tipo']; ?></p>
                            <br>
                            <button class="boton-agregar" 
                                    data-nombre="<?php echo $row['nombre']; ?>" 
                                    data-imagen="<?php echo $row['imagen']; ?>" 
                                    data-precio="A consultar" 
                                    onclick="mostrarInfoProducto(this)">
                                AGREGAR BOTELLA
                            </button>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No hay botellas disponibles.</p>
            <?php endif; ?>
        </section>
    </section>
</main>

<footer>
    <section class="formato_Footer">
        <div class="payment-section text-center my-4">
            <hr>
            <h2>Métodos de Pago</h2>
            <hr>
            <div class="payment-methods">
                <img src="imagenes/MetodosDePago/americanExpress.png" alt="Método de Pago: American Express" class="payment-image">
                <img src="imagenes/MetodosDePago/Mastercard-logo.png" alt="Método de Pago: Mastercard" class="payment-image">
                <img src="imagenes/MetodosDePago/Paypal_logo.png" alt="Método de Pago: PayPal" class="payment-image">
                <img src="imagenes/MetodosDePago/visa.png" alt="Método de Pago: Visa" class="payment-image">
            </div>
        </div>

        <div class="container-fluid my-5 footer-container">
            <div class="social-section d-flex justify-content-between">
                <span>Síguenos en redes sociales:</span>
                <div>
                    <a href="https://www.facebook.com/BULLDOGBar/" target="_blank" aria-label="Facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://x.com/BULLDOGBar" target="_blank" aria-label="Twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.instagram.com/BULLDOGBar/" target="_blank" aria-label="Instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.youtube.com/user/BULLDOGBar" target="_blank" aria-label="YouTube"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>

            <div class="footer-main">
                <div class="footer-columns">
                    <div>
                        <h6>Atención al Cliente</h6>
                        <hr />
                        <p><a href="contacto.html">Contacto</a></p>
                        <p><a href="faq.html">Preguntas Frecuentes</a></p>
                        <p><a href="reservaciones.html">Reservaciones</a></p>
                    </div>
                    <div>
                        <h6>Acerca de BULLDOG</h6>
                        <hr />
                        <p><a href="nosotros.html">Acerca de Nosotros</a></p>
                        <p><a href="pdf/MENU DIGITAL (RGB).pdf">Nuestro Menú</a></p>
                        <p><a href="eventos.html">Eventos y Promociones</a></p>
                    </div>
                    <div>
                        <h6>Ofertas y Membresías</h6>
                        <hr />
                        <p><a href="membresias.html">Programa de Membresías</a></p>
                        <p><a href="promociones.html">Promociones Exclusivas</a></p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                © 2024 BULLDOG Bar. Todos los derechos reservados.
            </div>
        </div>
    </section>
</footer>
</body>
</html>
