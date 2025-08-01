const modal = document.getElementById('modal');
const miniWindow = document.getElementById('mini-window');
const closeBtn = document.getElementById('close-btn');
const canvas = document.getElementById('scratchCanvas');
const ctx = canvas.getContext('2d');
const circle = document.getElementById('circle');
const requestPrizeBtn = document.getElementById('request-prize-btn');
const noPrize = document.getElementById('no-prize');
const prizeIcon = document.getElementById('prize-icon');
const prizeText = document.getElementById('prize-text');

// Lista de premios
const prizes = [
    { text: '¡Cubanito Gratis!', icon: 'bxs-drink' },
    { text: '¡Un Azulito!', icon: 'bxs-drink' },
    { text: '¡Un Shot Gratis!', icon: 'bxs-drink' },
    { text: '¡50% de descuento en tu siguiente compra!', icon: 'bxs-discount' },
];

// Seleccionar un premio aleatorio
function getRandomPrize() {
    const randomIndex = Math.floor(Math.random() * prizes.length);
    return prizes[randomIndex];
}

window.onload = () => {
    // Mostrar el modal
    modal.style.display = 'flex';
    setTimeout(() => {
        miniWindow.classList.add('show');
    }, 100);

    // Configurar el canvas al tamaño del círculo
    canvas.width = circle.offsetWidth;
    canvas.height = circle.offsetHeight;

    // Dibujar el área "rascable"
    ctx.fillStyle = '#666'; // Color gris de la capa rascable
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Asignar un premio aleatorio
    const selectedPrize = getRandomPrize();
    prizeIcon.className = `bx ${selectedPrize.icon}`;
    prizeText.textContent = selectedPrize.text;
};

closeBtn.addEventListener('click', () => {
    miniWindow.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 500);
});

noPrize.addEventListener('click', () => {
    miniWindow.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 500);
});

// Función para "rascar" al pasar el cursor
function scratch(e) {
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    // Crear el "raspado" (borrar con un círculo)
    ctx.globalCompositeOperation = 'destination-out';
    ctx.beginPath();
    ctx.arc(x, y, 20, 0, Math.PI * 2);
    ctx.fill();

    // Comprobar el porcentaje rascado
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    const pixels = imageData.data;
    let cleared = 0;

    for (let i = 3; i < pixels.length; i += 4) {
        if (pixels[i] === 0) cleared++;
    }

    const percentage = (cleared / (pixels.length / 4)) * 100;

    if (percentage > 70) {
        canvas.style.pointerEvents = 'none'; // Deshabilitar el rascar
        requestPrizeBtn.style.display = 'block'; // Mostrar el botón
    }
}

// Evento para rascar al mover el mouse sobre el canvas
canvas.addEventListener('mousemove', scratch);
