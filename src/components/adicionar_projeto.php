<section id="adicionarProjeto" class="fundo-modal">
    <div class="modal-grande">
        <div class="modal-header">
            <h2>Adicionar projeto</h2>
            <i class="bi bi-x-lg" onclick=FecharAdicionarProjeto()></i>
        </div>

        <form id="formularioAdicionarProjeto" method="GET" action="../../functions/adicionar_projeto.php" class="modal-conteudo">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

            <div class="input-container">
                <label class="label" for="inputNomeProjeto">Nome do projeto</label>
                <input id="inputNomeProjeto" name="nome_projeto" type="text" placeholder="Nome do projeto" class="input fundo-cinza-claro" autocomplete="off" required>
            </div>

            <div class="input-coluna">
                <div class="input-container">
                    <label class="label" for="inputDataInicio">Data de início</label>
                    <input id="inputDataInicio" name="data_inicio" type="date" class="input fundo-cinza-claro" required>
                </div>

                <div class="input-container">
                    <label class="label" for="inputDataTermino">Data de término</label>
                    <input id="inputDataTermino" name="data_termino" type="date" class="input fundo-cinza-claro" required>
                </div>
            </div>

            <div class="input-coluna">
                <div class="input-container">
                    <label class="label" for="inputDiretor">Diretor Responsável</label>
                    <input id="inputDiretor" name="nome_diretor" type="text" placeholder="Nome do diretor" class="input fundo-cinza-claro" list="listaDiretores" autocomplete="off" required>
                    <p class="mensagem-erro"><i class="bi bi-exclamation-circle-fill"></i> Usuário não encontrado</p>

                    <datalist id="listaDiretores">
                        <?php 
                            $sql = "SELECT U.NOME FROM USUARIOS U WHERE U.HIERARQUIA = 'DIRETOR'";
                            $query_diretor = $mysqli -> query($sql);

                            while ($row_diretor = $query_diretor -> fetch_assoc()) {
                                $nome_usuario = $row_diretor["NOME"];
                                echo '<option value="'.$nome_usuario.'">'.$nome_usuario.'</option>';
                            }
                        ?>
                    </datalist>
                </div>

                <div class="input-container">
                    <label class="label" for="inputCoordenador">Coordenador Responsável</label>
                    <input id="inputCoordenador" name="nome_coordenador" type="text" placeholder="Nome do coordenador" class="input fundo-cinza-claro" list="listaCoordenadores" autocomplete="off" required>
                    <p class="mensagem-erro"><i class="bi bi-exclamation-circle-fill"></i> Usuário não encontrado</p>

                    <datalist id="listaCoordenadores">
                        <?php 
                            $sql = "SELECT U.NOME FROM USUARIOS U WHERE U.HIERARQUIA = 'COORDENADOR'";
                            $query_coordenador = $mysqli -> query($sql);

                            while ($row_coordenador = $query_coordenador -> fetch_assoc()) {
                                $nome_usuario = $row_coordenador["NOME"];
                                echo '<option value="'.$nome_usuario.'">'.$nome_usuario.'</option>';
                            }
                        ?>
                    </datalist>
                </div>
            </div>

            <div class="input-container">
                <label class="label" for="inputLocal">Local</label>
                <input id="inputLocal" name="nome_local" type="text" placeholder="Nome do local" class="input fundo-cinza-claro" list="listaLocais" autocomplete="off">
                <p class="mensagem-erro"><i class="bi bi-exclamation-circle-fill"></i> Local não encontrado</p>

                <datalist id="listaLocais">
                    <?php 
                        $sql = "SELECT L.NOME FROM LOCAIS L";
                        $query_local = $mysqli -> query($sql);

                        while ($row_local = $query_local -> fetch_assoc()) {
                            $nome_local = $row_local["NOME"];
                            echo '<option value="'.$nome_local.'">'.$nome_local.'</option>';
                        }
                    ?>
                </datalist>
            </div>

            <div class="input-container">
                <label class="label" for="inputEscopo">Escopo</label>
                <textarea id="inputEscopo" name="escopo" placeholder="Escopo do projeto" class="textarea fundo-cinza-claro" autocomplete="off"></textarea>
            </div>

            <div class="input-container">
                <label class="label">Documentos (0)</label>
                <button class="botao-grande fundo-preto"><i class="bi bi-plus-lg"></i> Adicionar documento</button>
            </div>

            <div class="input-container">
                <label class="label">Equipamentos (0)</label>
                <div class="input-grupo">
                    <input placeholder="Nome do equipamento" class="input fundo-cinza-claro">
                    <input placeholder="Quantidade" class="input-pequeno fundo-cinza-claro">
                    <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>

            <div class="input-container">
                <label class="label">Recursos (R$ 0)</label>
                <div class="input-grupo">
                    <input placeholder="Fonte do recurso" class="input fundo-cinza-claro">
                    <input placeholder="Valor" class="input-pequeno fundo-cinza-claro">
                    <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>

            <button type="submit" class="botao-form fundo-preto">Adicionar projeto</button>
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
