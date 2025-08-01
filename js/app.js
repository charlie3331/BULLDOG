//Variable que mantiene el estado visible del carrito
var carritoVisible = false;

//Espermos que todos los elementos de la pàgina cargen para ejecutar el script
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}else{
    ready();
}

function ready(){
    
    //Agregremos funcionalidad a los botones eliminar del carrito
    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
    for(var i=0;i<botonesEliminarItem.length; i++){
        var button = botonesEliminarItem[i];
        button.addEventListener('click',eliminarItemCarrito);
    }

    //Agrego funcionalidad al boton sumar cantidad
    var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
    for(var i=0;i<botonesSumarCantidad.length; i++){
        var button = botonesSumarCantidad[i];
        button.addEventListener('click',sumarCantidad);
    }

     //Agrego funcionalidad al buton restar cantidad
    var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad');
    for(var i=0;i<botonesRestarCantidad.length; i++){
        var button = botonesRestarCantidad[i];
        button.addEventListener('click',restarCantidad);
    }

    //Agregamos funcionalidad al boton Agregar al carrito
    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
    for(var i=0; i<botonesAgregarAlCarrito.length;i++){
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked);
    }

    //Agregamos funcionalidad al botón comprar
    document.getElementsByClassName('btn-pagar')[0].addEventListener('click',pagarClicked)
}
//Eliminamos todos los elementos del carrito y lo ocultamos
function pagarClicked(){
    alert("Gracias por la compra");
    //Elimino todos los elmentos del carrito
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    while (carritoItems.hasChildNodes()){
        carritoItems.removeChild(carritoItems.firstChild)
    }
    actualizarTotalCarrito();
    ocultarCarrito();
}
//Funciòn que controla el boton clickeado de agregar al carrito
function agregarAlCarritoClicked(event){
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
    var precio = item.getElementsByClassName('precio-item')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;
    console.log(imagenSrc);

    agregarItemAlCarrito(titulo, precio, imagenSrc);

    hacerVisibleCarrito();
}


//Funcion que hace visible el carrito
function hacerVisibleCarrito(){
    carritoVisible = true;
    var carrito = document.getElementsByClassName('carrito')[0];
    carrito.style.marginRight = '0';
    carrito.style.opacity = '1';

    var items =document.getElementsByClassName('contenedor-items')[0];
    items.style.width = '60%';
}


function hola(){
    console.log("hola");
}

//Funciòn que agrega un item al carrito
function agregarItemAlCarrito(titulo, precio, imagenSrc) {
    console.log("entre a la funcion")
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

    // Buscamos si el item ya existe en el carrito
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
    console.log("entre al for")
    for (var i = 0; i < nombresItemsCarrito.length; i++) {
        if (nombresItemsCarrito[i].innerText === titulo) {
            console.log(`Índice encontrado: i = ${i}`);
            // Si ya existe, incrementamos la cantidad
            var cantidadInput = nombresItemsCarrito[i]
                .parentElement
                .parentElement
                .querySelector('.carrito-item-cantidad');

            cantidadInput.value = parseInt(cantidadInput.value) + 1;

            // Actualizamos el total del carrito
            actualizarTotalCarrito();
            return; // Salimos de la función, ya no necesitamos agregar un nuevo item
        }
    }

    // Si no existe, creamos un nuevo item
    var item = document.createElement('div');
    item.classList.add('item');

    var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `;

    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    // Agregamos la funcionalidad de eliminar al nuevo item
    item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    // Agregamos la funcionalidad de restar cantidad al nuevo item
    var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonRestarCantidad.addEventListener('click', restarCantidad);

    // Agregamos la funcionalidad de sumar cantidad al nuevo item
    var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonSumarCantidad.addEventListener('click', sumarCantidad);

    // Actualizamos el total
    actualizarTotalCarrito();
}


//Aumento en uno la cantidad del elemento seleccionado
function sumarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    actualizarTotalCarrito();
}
//Resto en uno la cantidad del elemento seleccionado
function restarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual--;
    if(cantidadActual>=1){
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
        actualizarTotalCarrito();
    }
}

//Elimino el item seleccionado del carrito
function eliminarItemCarrito(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //Actualizamos el total del carrito
    actualizarTotalCarrito();

    //la siguiente funciòn controla si hay elementos en el carrito
    //Si no hay elimino el carrito
    //ocultarCarrito();
}
//Funciòn que controla si hay elementos en el carrito. Si no hay oculto el carrito.
function ocultarCarrito(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(carritoItems.childElementCount==0){
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity = '0';
        carritoVisible = false;
    
        var items =document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '100%';
    }
}

//Actualizamos el total de Carrito
function actualizarTotalCarrito(){
    //seleccionamos el contenedor carrito
    var carritoContenedor = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;
    //recorremos cada elemento del carrito para actualizar el total
    for(var i=0; i< carritoItems.length;i++){
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
        //quitamos el simobolo peso y el punto de milesimos.
        var precio = parseFloat(precioElemento.innerText.replace('$','').replace('.',''));
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        console.log(precio);
        var cantidad = cantidadItem.value;
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100)/100;

    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$'+total.toLocaleString("es") + ",00";

}



// Mostrar el carrito al hacer clic en el icono del carrito
const iconoCarrito = document.getElementById('icono-carrito');
const carrito = document.getElementById('carrito');
const cerrarCarrito = document.getElementById('cerrar-carrito');

// Función para mostrar el carrito
iconoCarrito.addEventListener('click', () => {
    carrito.style.opacity = '1';
    carrito.style.visibility = 'visible';
    iconoCarrito.style.visibility = 'hidden';  // Ocultar el icono cuando el carrito está visible
});

// Función para cerrar el carrito
cerrarCarrito.addEventListener('click', () => {
    carrito.style.opacity = '0';
    carrito.style.visibility = 'hidden';
    iconoCarrito.style.visibility = 'visible';  // Mostrar el icono cuando el carrito se oculta
});

// Función para cerrar el carrito si haces clic fuera de él
document.addEventListener('click', (event) => {
    if (!carrito.contains(event.target) && !iconoCarrito.contains(event.target)) {
        carrito.style.opacity = '0';
        carrito.style.visibility = 'hidden';
        iconoCarrito.style.visibility = 'visible';  // Mostrar el icono cuando el carrito se cierra
    }
});

// Seleccionamos todos los botones con clase "boton-item"
const botones = document.querySelectorAll(".boton-item");

document.getElementById("aplicar-descuento").addEventListener("click", function () {
    const inputDescuento = document.getElementById("input-descuento").value.trim();
    const totalElement = document.querySelector(".carrito-precio-total");
    const mensajeDescuento = document.getElementById("mensaje-descuento");

    // Eliminar el mensaje previo
    mensajeDescuento.textContent = "";

    // Obtener el valor actual del total
    let total = parseFloat(totalElement.textContent.replace("$", "").replace(",", "."));

    // Validar el código de descuento
    if (inputDescuento === "DESCUENTO05") {
        // Aplicar el descuento del 5%
        const descuento = total * 0.05;
        total -= descuento;

        // Mostrar el nuevo total
        totalElement.textContent = `$${total.toFixed(2).replace(".", ",")}`;

        // Mensaje de éxito
        mensajeDescuento.textContent = "Descuento aplicado correctamente.";
    } else {
        // Mostrar mensaje de error
        mensajeDescuento.textContent = "Código de descuento inválido.";
        mensajeDescuento.style.color = "#d9534f"; // Color rojo para error
    }
});





