let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function showItem(index) {
    const currentActive = document.querySelector('.carousel-item.active');
    
    if (currentActive) {
        currentActive.classList.remove('active');
        currentActive.classList.add('outgoing');

        setTimeout(() => {
            currentActive.classList.remove('outgoing');
        }, 1000);
    }

    items[index].classList.add('active');
}

function nextItem() {
    currentIndex = (currentIndex + 1) % totalItems; // Próximo item
    showItem(currentIndex);
}

function prevItem() {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems; // Item anterior
    showItem(currentIndex);
}

setInterval(nextItem, 7000); // Troca automática

// Inicializa o carrossel
showItem(currentIndex);
