    // Recupera o estado do localStorage
    let isCompleted = localStorage.getItem("isCompleted") === "true";

    const button = document.getElementById("completeButton");
    const message = document.getElementById("message");

    // Se já estiver completado, atualiza a interface
    if (isCompleted) {
        button.textContent = "Concluído! ★";
        button.style.backgroundColor = "green"; // Altera a cor para verde
        message.classList.remove("hidden");
        message.classList.add("show");
    }

    button.addEventListener("click", function() {
        // Verifica se o estado já está "Concluído"
        if (!isCompleted) {
            // Muda o texto do botão para "Concluído!"
            button.textContent = "Concluído! ★";
            button.style.backgroundColor = "green"; // Altera a cor de fundo para verde
            isCompleted = true; // Atualiza o estado para "Concluído"
            localStorage.setItem("isCompleted", "true"); // Salva o estado no localStorage

            // Exibe a mensagem de conclusão
            message.classList.remove("hidden");
            message.classList.add("show");
        }
    });