document.addEventListener('DOMContentLoaded', () => {
    const whatsappFloat = document.getElementById('whatsapp-float');
    const closeWhatsapp = document.getElementById('close-whatsapp');

    closeWhatsapp.addEventListener('click', () => {
        whatsappFloat.style.opacity = '0'; // Añade una transición suave
        setTimeout(() => {
            whatsappFloat.style.display = 'none'; // Ocultar el elemento después de la transición
        }, 300);
    });
});
