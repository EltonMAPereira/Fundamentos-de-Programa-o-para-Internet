function adicionarCampo(containerId, nomeCampo) {
    const container = document.getElementById(containerId);

    // Cria o grupo (textarea + botão remover)
    const grupo = document.createElement("div");
    grupo.className = "campo-grupo";

    const textarea = document.createElement("textarea");
    textarea.name = nomeCampo;
    textarea.rows = 3;
    textarea.required = true;

    const btnRemover = document.createElement("button");
    btnRemover.type = "button";
    btnRemover.className = "btn-remover";
    btnRemover.textContent = "X";
    btnRemover.onclick = function() {
        removerCampo(btnRemover);
    };

    grupo.appendChild(textarea);
    grupo.appendChild(btnRemover);
    container.appendChild(grupo);
}

function removerCampo(botao) {
    const grupo = botao.parentElement;
    const container = grupo.parentElement;

    // Impede de remover todos (pelo menos 1 obrigatório)
    if (container.querySelectorAll(".campo-grupo").length > 1) {
        grupo.remove();
    } else {
        alert("Você precisa ter pelo menos um campo.");
    }
}
