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
            <section id="informacoesFase" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Informações da fase</h2>
                        <i class="bi bi-x-lg" onclick=FecharInformacoesFase()></i>
                    </div>

                    <div class="modal-conteudo">
                        <div class="input-container">
                            <label class="label">Nome da fase</label>
                            <input type="text" class="input fundo-cinza-claro" value="'.$nome_fase.'" disabled>
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Data de início</label>
                                <input type="date" class="input fundo-cinza-claro" value="'.$data_inicio.'" disabled>
                            </div>

                            <div class="input-container">
                                <label class="label">Data de termino</label>
                                <input type="date" class="input fundo-cinza-claro" value="'.$data_termino.'" disabled>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Escopo</label>
                            <textarea class="textarea fundo-cinza-claro" disabled>'.$escopo.'</textarea>
                        </div>';

                        $sql = "SELECT SUM(G.VALOR) AS SOMA_GASTO FROM GASTOS G INNER JOIN FASES F ON G.ID_FASE = F.ID_FASE WHERE F.ID_FASE = '$id_fase'";
                        $query_soma_gasto = $mysqli -> query($sql);
                        $row_soma_gasto = $query_soma_gasto -> fetch_assoc();
                        $soma_gasto = $row_soma_gasto["SOMA_GASTO"];

                        echo '
                            <div class="input-container">
                                <label class="label">Gastos (R$'.$soma_gasto.')</label>
                        ';

                        $sql = "SELECT G.DESTINO, G.VALOR FROM GASTOS G INNER JOIN FASES F ON G.ID_FASE = F.ID_FASE WHERE F.ID_FASE = '$id_fase'";
                        $query_gasto = $mysqli -> query($sql);

                        while ($row_gasto = $query_gasto -> fetch_assoc()) {
                            $destino_gasto = $row_gasto["DESTINO"];
                            $valor_gasto = $row_gasto["VALOR"];

                            echo '<input class="input fundo-cinza-claro" value="'.$destino_gasto.' - R$ '.$valor_gasto.'" disabled>';
                        }

                        $sql = "SELECT E.NOME, EU.QUANTIDADE_UTILIZADA FROM EQUIPAMENTOS E INNER JOIN EQUIPAMENTOS_UTILIZADOS EU ON E.ID_EQUIPAMENTO = EU.ID_EQUIPAMENTO INNER JOIN FASES F ON EU.ID_FASE = F.ID_FASE WHERE F.ID_FASE = '$id_fase'";
                        $query_equipamento_utilizado = $mysqli -> query($sql);
                        $quantidade_equipamento_utilizado = $query_equipamento_utilizado -> num_rows;

                        echo '
                            </div>
                            <div class="input-container">
                                <label class="label">Equipamentos utilizados ('.$quantidade_equipamento_utilizado.')</label>
                        ';

                        while ($row_equipamento_utilizado = $query_equipamento_utilizado -> fetch_assoc()) {
                            $nome_equipamento_utilizado = $row_equipamento_utilizado["NOME"];
                            $quantidade_utilizada = $row_equipamento_utilizado["QUANTIDADE_UTILIZADA"];

                            echo '<input class="input fundo-cinza-claro" value="'.$nome_equipamento_utilizado.' ('.$quantidade_utilizada.')" disabled>';
                        }
                        
                        echo '</div>
                    </div>
                </div>
            </section>

            <script>
                function FecharInformacoesFase() {
                    let informacoesFase = document.getElementById("informacoesFase");
                    informacoesFase.style.display = "none";
                }

                function AbrirInformacoesFase() {
                    let informacoesFase = document.getElementById("informacoesFase");
                    informacoesFase.style.display = "flex";
                }
            </script>
        ';
?>