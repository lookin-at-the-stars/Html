const navbar = document.querySelector(".navbar");
const menuButton = document.querySelector(".menu-btn");
const menu = document.querySelector("nav");
const closeButton = document.querySelector(".close-btn");

// Adiciona o evento de clique no botão de menu
menuButton.addEventListener("click", () => {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
    closeButton.style.display = menu.style.display === "block" ? "block" : "none"; // Mostra/oculta o "X"
});

// Adiciona evento de clique para fechar o menu
closeButton.addEventListener("click", () => {menu.style.display = "none"; // Oculta o menu
    closeButton.style.display = "none"; // Esconde o "X"
});

// Adiciona evento para redimensionamento da janela
window.addEventListener("resize", () => {
    if (window.innerWidth > 800) {
        menu.style.display = "flex"; // Exibe o menu em telas maiores
        closeButton.style.display = "none"; // Esconde o "X" em telas maiores
    } else {
        menu.style.display = "none"; // Oculta o menu em telas menores
        closeButton.style.display = "none"; // Esconde o "X"
    }
});
