<?php
    $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESTADO AS ESTADO_FASE FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
    $query_projeto_fase = $mysqli -> query($sql);

    $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
    $id_coordenador = $row_projeto_fase["ID_COORDENADOR"];

    if ($hierarquia == "VOLUNTÁRIO" or $hierarquia == "COORDENADOR" and $id_coordenador != $id_usuario) {
        $sql = "SELECT T.ID_TAREFA, T.NOME, T.DATA_VENCIMENTO, T.DESCRICAO, T.ESTADO, UT.ID_USUARIO FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER' AND UT.ID_USUARIO = '$id_usuario'";
        $query_tarefa = $mysqli -> query($sql);
    }
    else {
        $sql = "SELECT T.ID_TAREFA, T.NOME, T.DATA_VENCIMENTO, T.DESCRICAO, T.ESTADO, UT.ID_USUARIO FROM TAREFAS T LEFT JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER'";
        $query_tarefa = $mysqli -> query($sql);
    }

    while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
        $id_tarefa = $row_tarefa["ID_TAREFA"];
        $id_usuario_tarefa = $row_tarefa["ID_USUARIO"];
        $nome_tarefa = $row_tarefa["NOME"];
        $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
        $descricao_tarefa = $row_tarefa["DESCRICAO"];
        $estado_tarefa = $row_tarefa["ESTADO"];
        
        echo '
            <section id="informacoesTarefa'.$id_tarefa.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Informações da tarefa</h2>
                        <i class="bi bi-x-lg" onclick=FecharInformacoesTarefa'.$id_tarefa.'()></i>
                    </div>

                    <div class="modal-conteudo">
                        <div class="informacoes-tarefa-header">
                            <div>
                                <h3 class="titulo-grande">'.$nome_tarefa.'</h3>
                                <p class="sub-titulo">Vence dia '.$data_vencimento.'</p>
                            </div>

                            <select class="select-estado-tarefa"'.($id_usuario_tarefa == $id_usuario ? '' : 'disabled').'>
                                <option '.($estado_tarefa == "A FAZER" ? 'selected' : '').'>A fazer</option>
                                <option '.($estado_tarefa == "EM ANDAMENTO" ? 'selected' : '').'>Em andamento</option>
                                <option '.($estado_tarefa == "CONCLUÍDA" ? 'selected' : '').'>Concluída</option>
                            </select>
                        </div>

                        <div class="input-container">
                            <label class="label">Descrição</label>
                            <textarea class="textarea" disabled>'.$descricao_tarefa.'</textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Anexo</label>
                            <div class="input-grupo">
                                <input type="text" class="input" value="Nenhum arquivo anexado" disabled>
                                '.($id_usuario_tarefa == $id_usuario ? '<button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>' : '').'
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function FecharInformacoesTarefa'.$id_tarefa.'() {
                    let informacoesTarefa = document.getElementById("informacoesTarefa'.$id_tarefa.'");
                    informacoesTarefa.style.display = "none";
                }

                function AbrirInformacoesTarefa'.$id_tarefa.'() {
                    let informacoesTarefa = document.getElementById("informacoesTarefa'.$id_tarefa.'");
                    informacoesTarefa.style.display = "flex";
                }
            </script>
        ';
    }
?>