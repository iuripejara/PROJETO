// Obtém o ID do vídeo atual a partir da URL (ex: videos.php?id=1)
const urlParams = new URLSearchParams(window.location.search);
const videoId = urlParams.get('id');

// Recupera o estado do localStorage para este vídeo específico
let isCompleted = localStorage.getItem(`isCompleted_${videoId}`) === "true";

const button = document.getElementById("completeButton");
const message = document.getElementById("message");

// Atualiza a interface se o vídeo já estiver marcado como concluído
if (isCompleted) {
    button.textContent = "Concluído! ★";
    button.style.backgroundColor = "green";
    message.classList.remove("hidden");
    message.classList.add("show");
}

button.addEventListener("click", function() {
    // Verifica se o estado já está "Concluído"
    if (!isCompleted) {
        button.textContent = "Concluído! ★";
        button.style.backgroundColor = "green";
        isCompleted = true;
        localStorage.setItem(`isCompleted_${videoId}`, "true");

        // Exibe a mensagem de conclusão
        message.classList.remove("hidden");
        message.classList.add("show");
    }
});
