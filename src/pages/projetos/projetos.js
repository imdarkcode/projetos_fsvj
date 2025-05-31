function ExibirFases() {
    let fasesProjeto = document.getElementById("fasesProjeto");
    let btnExibirFases = document.getElementById("btnExibirFases");
    let btnEsconderFases = document.getElementById("btnEsconderFases");

    btnExibirFases.style.display = "none";
    btnEsconderFases.style.display = "block";
    fasesProjeto.style.display = "block"
}

function EsconderFases() {
    let fasesProjeto = document.getElementById("fasesProjeto");
    let btnExibirFases = document.getElementById("btnExibirFases");
    let btnEsconderFases = document.getElementById("btnEsconderFases");

    btnExibirFases.style.display = "block";
    btnEsconderFases.style.display = "none";
    fasesProjeto.style.display = "none"
}