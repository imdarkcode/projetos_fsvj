<?php
    $sql = "SELECT P.ID_PROJETO FROM PROJETOS P WHERE P.ID_COORDENADOR = '$id_usuario'";
    $query_projeto = $mysqli -> query($sql);

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];

        echo '
            <section id="adicionarFase'.$id_projeto.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Adicionar fase</h2>
                        <i class="bi bi-x-lg" onclick=FecharAdicionarFase'.$id_projeto.'()></i>
                    </div>

                    <form method="GET" action="../../functions/adicionar_fase.php" class="modal-conteudo">
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_projeto" value="'.$id_projeto.'">

                        <div class="input-container">
                            <label class="label">Nome da fase</label>
                            <input type="text" name="nome_fase" class="input fundo-cinza-claro" placeholder="Nome da Fase" autocomplete="off" required>
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Data de início</label>
                                <input type="date" name="data_inicio" class="input fundo-cinza-claro" required>
                            </div>

                            <div class="input-container">
                                <label class="label">Data de termino</label>
                                <input type="date" name="data_termino" class="input fundo-cinza-claro" required>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Escopo</label>
                            <textarea class="textarea fundo-cinza-claro" name="escopo" placeholder="Escopo da fase" autocomplete="off"></textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Gastos</label>
                            <div class="input-grupo">
                                <input type="text" class="input fundo-cinza-claro" placeholder="Destino do gasto">
                                <input type="text" class="input-pequeno fundo-cinza-claro" placeholder="Valor">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Equipamentos utilizados</label>
                            <div class="input-grupo">
                                <input type="text" class="input fundo-cinza-claro" placeholder="Nome do equipamento">
                                <input type="text" class="input-pequeno fundo-cinza-claro" placeholder="Quantidade">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <button type="submit" class="botao-form fundo-preto">Adicionar Fase</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "none";
                }

                function AbrirAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "flex";
                }
            </script>
        ';
    }
?>
