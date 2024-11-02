function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const button = input.nextElementSibling; // Botão para mostrar/ocultar senha

    if (input.type === "password") {
        input.type = "text";
        button.innerText = "🙈"; // Alterar para ícone de olho fechado
    } else {
        input.type = "password";
        button.innerText = "👁️"; // Alterar para ícone de olho aberto
    }
}
