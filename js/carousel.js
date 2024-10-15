let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function showItem(index) {
    const currentActive = document.querySelector('.carousel-item.active');
    
    if (currentActive) {
        // Remover a classe active e adicionar a classe de saída (outgoing)
        currentActive.classList.remove('active');
        currentActive.classList.add('outgoing');
        
        // Remover a classe outgoing após a transição de saída
        setTimeout(() => {
            currentActive.classList.remove('outgoing');
        }, 1000); // Aqui você define o tempo da saída (1s no exemplo)
    }

    // Definir o novo item ativo
    items[index].classList.add('active');
}

function nextItem() {
    currentIndex = (currentIndex + 1) % totalItems; // Cicla para o próximo item
    showItem(currentIndex);
}

// Muda para o próximo item a cada 7 segundos
setInterval(nextItem, 7000);

// Inicializa o primeiro item visível
showItem(currentIndex);

// let currentIndex = 0;
// const items = document.querySelectorAll('.carousel-item');
// const totalItems = items.length;

// function showItem(index) {
//     // Calcula o próximo e o anterior
//     const nextIndex = (index + 1) % totalItems;
//     const prevIndex = (index - 1 + totalItems) % totalItems;

//     // Esconde todos os itens
//     items.forEach(item => {
//         item.classList.remove('active');
//         item.classList.remove('next');
//         item.classList.remove('prev');
//     });

//     // Define o estado dos itens
//     items[index].classList.add('active');
//     items[nextIndex].classList.add('next');
//     items[prevIndex].classList.add('prev');
// }

// function nextItem() {
//     currentIndex = (currentIndex + 1) % totalItems; // Cicla para o próximo item
//     showItem(currentIndex);
// }

// // Muda para o próximo item a cada 7 segundos
// setInterval(nextItem, 7000);

// // Inicializa o primeiro item visível
// showItem(currentIndex);
