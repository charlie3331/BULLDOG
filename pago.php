<?php
// Inicialización de la variable para el total
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Hind:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleCupon.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/whats.css">
    <link rel="stylesheet" href="css/bebidas.css">
    <link rel="stylesheet" href="css/comentario.css">
    <link rel="stylesheet" href="pago2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="imagenes/srpersonalizador.png">
    <style>
        .item-resumen {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .item-resumen img {
            margin-right: 10px;
        }
        #cart-summary {
            margin-bottom: 20px;
        }
        #cart-summary h2 {
            margin-bottom: 20px;
        }
        .total {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <a href="index.html">
        <img src="imagenes/srpersonalizador.png" alt="Logo" class="logo" id="logo">
    </a>
    <ul class="contactanos">
        <a href="menu.html">MENU</a>
        <a href="nosotros.html">SOBRE NOSOTROS</a>
    </ul>
    <h1><a href="index.html">BULLDOG</a></h1>
    <ul class="contactanos">
        <a href="index.html">INICIO</a>
        <a href="contacto.html">CONTACTANOS</a>
        <a href="inicio_sesion.html">TU CUENTA</a>
        <a href="index.html">REDES SOCIALES</a>
    </ul>
</header>

<section>
    <div class="container">
        <section id="checkout-section">
            <h2>Finalizar Compra</h2>
            <div id="cart-summary">
                <!-- Resumen del carrito cargado desde localStorage -->
                <div id="contenedor-resumen"></div>
            </div>
            <hr>
            <form id="payment-form">
                <h3>Datos de Pago</h3>
                <label for="name">Nombre completo:</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required><br><br>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="tuemail@example.com" required><br><br>

                <label for="card">Número de Tarjeta:</label>
                <input type="text" id="card" name="card" placeholder="1234 5678 9012 3456" required><br><br>

                <label for="expiry">Fecha de Expiración:</label>
                <input type="month" id="expiry" name="expiry" required><br><br>

                <label for="cvv">CVV:</label>
                <input type="password" id="cvv" name="cvv" placeholder="123" required><br><br>

                <button type="submit" id="pay-button">Pagar Ahora</button>
                <div id="payment-success" style="display: none;">
                     <h2>Pago Exitoso</h2>
                     <p>Tu pago ha sido procesado con éxito. ¡Gracias por tu compra!</p>
                     </div>
            </form>
        </section>
    </div>
</section>

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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carritoData = JSON.parse(localStorage.getItem('carrito'));
        const contenedorResumen = document.getElementById('contenedor-resumen');
        let total = 0;

        if (carritoData && carritoData.length > 0) {
            carritoData.forEach(item => {
                const itemHTML = `
                    <div class="item-resumen">
                        <img src="${item.imagen}" width="80px" alt="">
                        <div>
                            <h3>${item.titulo}</h3>
                            <p>Cantidad: ${item.cantidad}</p>
                            <p>Precio: $${item.precio}</p>
                        </div>
                    </div>
                `;
                total += item.precio * item.cantidad;
                contenedorResumen.innerHTML += itemHTML;
            });
            contenedorResumen.innerHTML += `<div class="total">Total: $${total.toFixed(2)}</div>`;
        } else {
            contenedorResumen.innerHTML = '<p>No hay elementos en el carrito.</p>';
        }
    });
</script>
<script src="js/ventanaemergente.js"></script>
<script>
    function handlePayment(event) {
        event.preventDefault(); // Prevenir que el formulario se envíe por defecto

        // Mostrar el mensaje de éxito
        document.getElementById("payment-success").style.display = "block";

        // Ocultar el formulario de pago
        document.getElementById("payment-form").style.display = "none";

        // Imprimir la página (simular la factura)
        window.print();

        // Aquí podrías enviar los datos del pago a tu servidor para procesar el pago real, si fuera necesario.
    }
</script>

<script src="js/whats.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
