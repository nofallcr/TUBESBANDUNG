document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".ulasan-card");

    cards.forEach((card, i) => {
        card.style.opacity = 0;
        card.style.transition = "opacity 0.7s ease " + (i * 0.3) + "s";

        setTimeout(() => {
            card.style.opacity = 1;
        }, 200);
    });
});
