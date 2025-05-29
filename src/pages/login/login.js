function ExibirSenha() {
    let btnExibirSenha = document.getElementById("btnExibirSenha");
    let btnEsconderSenha = document.getElementById("btnEsconderSenha");
    let inputSenha = document.getElementById("inputSenha");

    btnExibirSenha.style.display = "none";
    btnEsconderSenha.style.display = "block";
    inputSenha.type = "text";
}

function EsconderSenha() {
    let btnEsconderSenha = document.getElementById("btnEsconderSenha");
    let btnExibirSenha = document.getElementById("btnExibirSenha");

    btnEsconderSenha.style.display = "none";
    btnExibirSenha.style.display = "block";
    inputSenha.type = "password";
}