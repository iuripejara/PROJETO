// scripts/image-click.js

document.addEventListener("DOMContentLoaded", function() {
    const clickableImages = document.querySelectorAll(".clickable-image");

    clickableImages.forEach(image => {
        image.addEventListener("click", function() {
            this.classList.toggle("expanded");
        });
    });
});
