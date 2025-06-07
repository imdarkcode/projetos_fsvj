<section id="adicionarProjeto" class="fundo-modal">
    <div class="modal-grande">
        <div class="modal-header">
            <h2>Adicionar projeto</h2>
            <i class="bi bi-x-lg" onclick=FecharAdicionarProjeto()></i>
        </div>

        <form class="modal-conteudo">
            <div class="input-container">
                <label class="label" for="inputNomeProjeto">Nome do projeto</label>
                <input id="inputNomeProjeto" type="text" placeholder="Nome do projeto" class="input">
            </div>

            <div class="input-coluna">
                <div class="input-container">
                    <label class="label" for="inputDataInicio">Data de início</label>
                    <input id="inputDataInicio" type="date" placeholder="00/00/0000" class="input">
                </div>

                <div class="input-container">
                    <label class="label" for="inputDataTermino">Data de término</label>
                    <input id="inputDataTermino" type="date" placeholder="00/00/0000" class="input">
                </div>
            </div>

            <div class="input-coluna">
                <div class="input-container">
                    <label class="label" for="inputDiretor">Diretor Responsável</label>
                    <input id="inputDiretor" type="text" placeholder="Nome do diretor" class="input">
                </div>

                <div class="input-container">
                    <label class="label" for="inputCoordenador">Coordenador Responsável</label>
                    <input id="inputCoordenador" type="text" placeholder="Nome do coordenador" class="input">
                </div>
            </div>

            <div class="input-container">
                <label class="label" for="inputLocal">Local</label>
                <input id="inputLocal" type="text" placeholder="Nome do local" class="input">
            </div>

            <div class="input-container">
                <label class="label" for="inputEscopo">Escopo</label>
                <textarea id="inputEscopo" placeholder="Escopo do projeto" class="textarea"></textarea>
            </div>

            <div class="input-container">
                <label class="label">Documentos (0)</label>
                <button class="botao-grande fundo-preto"><i class="bi bi-plus-lg"></i> Adicionar documento</button>
            </div>

            <div class="input-container">
                <label class="label">Equipamentos (0)</label>
                <div class="input-grupo">
                    <input placeholder="Nome do equipamento" class="input">
                    <input placeholder="Quantidade" class="input-pequeno">
                    <button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>

            <div class="input-container">
                <label class="label">Recursos (R$ 0)</label>
                <div class="input-grupo">
                    <input placeholder="Fonte do recurso" class="input">
                    <input placeholder="Valor" class="input-pequeno">
                    <button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>

            <button class="botao-form botao-preto">Adicionar projeto</button>
        </form>
    </div>
</section>

<script>
    function FecharAdicionarProjeto() {
        let adicionarProjeto = document.getElementById("adicionarProjeto");
        adicionarProjeto.style.display = "none";
    }

    function AbrirAdicionarProjeto() {
        let adicionarProjeto = document.getElementById("adicionarProjeto");
        adicionarProjeto.style.display = "flex";
    }
</script>
