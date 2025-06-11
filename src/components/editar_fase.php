<?php
    $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESCOPO AS ESCOPO_FASE, F.DATA_INICIO, F.DATA_TERMINO FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
    $query_projeto_fase = $mysqli -> query($sql);

    $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
    $id_coordenador = $row_projeto_fase["ID_COORDENADOR"];

    $nome_fase = $row_projeto_fase["NOME_FASE"];
    $data_inicio = $row_projeto_fase["DATA_INICIO"];
    $data_termino = $row_projeto_fase["DATA_TERMINO"];
    $escopo = $row_projeto_fase["ESCOPO_FASE"];
        
        echo '
            <section id="editarFase" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Editar fase</h2>
                        <i class="bi bi-x-lg" onclick=FecharEditarFase()></i>
                    </div>

                    <form method="GET" action="../../functions/editar_fase.php" class="modal-conteudo">
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_fase" value="'.$id_fase.'">

                        <div class="input-container">
                            <label class="label">Nome da fase</label>
                            <input type="text" class="input fundo-cinza-claro" name="nome_fase" placeholder="Nome da fase" value="'.$nome_fase.'">
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Data de início</label>
                                <input type="date" class="input fundo-cinza-claro" name="data_inicio" value="'.$data_inicio.'">
                            </div>

                            <div class="input-container">
                                <label class="label">Data de termino</label>
                                <input type="date" class="input fundo-cinza-claro" name="data_termino" value="'.$data_termino.'">
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Escopo</label>
                            <textarea class="textarea fundo-cinza-claro" name="escopo" placeholder="Escopo">'.$escopo.'</textarea>
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

                        <button type="submit" class="botao-form fundo-preto">Editar Fase</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharEditarFase() {
                    let editarFase = document.getElementById("editarFase");
                    editarFase.style.display = "none";
                }

                function AbrirEditarFase() {
                    let editarFase = document.getElementById("editarFase");
                    editarFase.style.display = "flex";
                }
            </script>
        ';
?>