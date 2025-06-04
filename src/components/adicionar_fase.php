<?php
    $sql = "SELECT * FROM PROJETOS P LEFT JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE P.ID_COORDENADOR = '$id_usuario'";
    $query_projeto = $mysqli -> query($sql);

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        echo '
            <section id="adicionarFase'.$id_projeto.'" class="adicionar-fase">
                <div class="fundo-escuro">
                    <div class="card-adicionar-fase">
                        <div class="card-adicionar-header">
                            <h2>Adicionar fase</h2>
                            <i class="bi bi-x-lg" onclick=FecharAdicionarFase'.$id_projeto.'()></i>
                        </div>

                        <div class="card-adicionar-main">
                            <form class="form">
                                <div class="input-group input-nome-fase">
                                    <label for="inputNomeFase">Nome da fase</label>
                                    <input id="inputNomeFase" type="text" placeholder="Nome da Fase">
                                </div>

                                <div class="input-group">
                                    <label for="inputDataInicio">Data de início</label>
                                    <input id="inputDataInicio" type="date">
                                </div>

                                <div class="input-group">
                                    <label for="inputDataTermino">Data de término</label>
                                    <input id="inputDataTermino" type="date">
                                </div>

                                <div class="input-group input-escopo">
                                    <label for="inputEscopo">Escopo</label>
                                    <textarea id="inputEscopo" placeholder="Escopo da fase"></textarea>
                                </div>

                                <div class="input-group input-gastos">
                                    <label>Cadastrar gastos</label>
                                    <div class="input-cadastrar"><input placeholder="Fonte do gasto"><input placeholder="Valor"><button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button></div>
                                </div>

                                <div class="input-group input-equipamentos-utilizados">
                                    <label>Cadastrar equipamentos utilizados</label>
                                    <div class="input-cadastrar"><input placeholder="Nome do equipamento"><input placeholder="Quantidade"><button class="botao-pequeno botao-preto"><i class="bi bi-plus-lg"></i></button></div>
                                </div>

                                <button class="botao-texto botao-preto">Adicionar fase</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function FecharAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "none";
                }

                function AbrirAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "block";
                }
            </script>
        ';
    }
?>
