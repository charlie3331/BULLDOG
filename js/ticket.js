// Función para validar los campos de pago
document.getElementById("payment-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    // Obtener los valores de los campos
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var card = document.getElementById("card").value;
    var expiry = document.getElementById("expiry").value;
    var cvv = document.getElementById("cvv").value;

    // Validar que todos los campos están llenos
    if (!name || !email || !card || !expiry || !cvv) {
        alert("Por favor, complete todos los campos.");
        return;
    }

    // Si la validación es exitosa, simular un pago exitoso
    alert("¡Pago exitoso! Se procederá con la impresión.");

    // Mostrar el mensaje de pago exitoso y proceder con la impresión
    document.querySelector(".payment-success").style.display = "block";

    // Imprimir la página automáticamente después de mostrar el mensaje de éxito
    window.print();
});
