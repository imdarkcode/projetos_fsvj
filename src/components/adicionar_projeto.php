<section id="adicionarProjeto" class="adicionar-projeto">
    <div class="fundo-escuro">
        <div class="card-adicionar-projeto">
            <div class="card-adicionar-header">
                <h2>Adicionar projeto</h2>
                <i class="bi bi-x-lg" onclick=FecharAdicionarProjeto()></i>
            </div>

            <div class="card-adicionar-main">
                <form class="form">
                    <div class="input-group input-nome-projeto">
                        <label for="inputNomeProjeto">Nome do projeto</label>
                        <input id="inputNomeProjeto" type="text" placeholder="Nome do projeto">
                    </div>

                    <div class="input-group">
                        <label for="inputDataInicio">Data de início</label>
                        <input id="inputDataInicio" type="date" placeholder="00/00/0000">
                    </div>

                    <div class="input-group">
                        <label for="inputDataTermino">Data de término</label>
                        <input id="inputDataTermino" type="date" placeholder="00/00/0000">
                    </div>

                    <div class="input-group">
                        <label for="inputDiretor">Diretor Responsável</label>
                        <input id="inputDiretor" type="text" placeholder="Nome do diretor">
                    </div>

                    <div class="input-group">
                        <label for="inputCoordenador">Coordenador Responsável</label>
                        <input id="inputCoordenador" type="text" placeholder="Nome do coordenador">
                    </div>

                    <div class="input-group input-local">
                        <label for="inputLocal">Local</label>
                        <input id="inputLocal" type="text" placeholder="Nome do local">
                    </div>

                    <div class="input-group input-escopo">
                        <label for="inputEscopo">Escopo</label>
                        <textarea id="inputEscopo" placeholder="Escopo do projeto"></textarea>
                    </div>

                    <div class="input-group input-documentos">
                        <label>Documentos (0)</label>
                        <button><i class="bi bi-plus-lg"></i> Adicionar documento</button>
                    </div>

                    <div class="input-group input-equipamentos">
                        <label>Equipamentos (0)</label>
                        <div class="input-cadastrar"><input placeholder="Nome do equipamento"><input placeholder="Quantidade"><button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button></div>
                    </div>

                    <div class="input-group input-recursos">
                        <label>Recursos (R$ 0)</label>
                        <div class="input-cadastrar"><input placeholder="Fonte do recurso"><input placeholder="Valor"><button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button></div>
                    </div>

                    <button class="botao-texto botao-preto">Adicionar projeto</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function FecharAdicionarProjeto() {
        let adicionarProjeto = document.getElementById("adicionarProjeto");
        adicionarProjeto.style.display = "none";
    }

    function AbrirAdicionarProjeto() {
        let adicionarProjeto = document.getElementById("adicionarProjeto");
        adicionarProjeto.style.display = "block";
    }
</script>
