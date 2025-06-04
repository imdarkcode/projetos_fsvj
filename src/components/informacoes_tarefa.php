<?php
    $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESTADO AS ESTADO_FASE FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
    $query_projeto_fase = $mysqli -> query($sql);

    $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
    $id_coordenador = $row_projeto_fase["ID_COORDENADOR"];

    if ($hierarquia == "VOLUNTÁRIO" or $hierarquia == "COORDENADOR" and $id_coordenador != $id_usuario) {
        $sql = "SELECT T.ID_TAREFA, T.NOME, T.DATA_VENCIMENTO FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER' AND UT.ID_USUARIO = '$id_usuario'";
        $query_tarefa = $mysqli -> query($sql);
    }
    else {
        $sql = "SELECT T.ID_TAREFA, T.NOME, T.DATA_VENCIMENTO, T.DESCRICAO FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER'";
        $query_tarefa = $mysqli -> query($sql);
    }

    while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
        $id_tarefa = $row_tarefa["ID_TAREFA"];
        $nome_tarefa = $row_tarefa["NOME"];
        $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
        $descricao_tarefa = $row_tarefa["DESCRICAO"];
        
        echo '
            <section id="informacoesTarefa'.$id_tarefa.'" class="informacoes-tarefa">
                <div class="fundo-escuro">
                    <div class="card-informacoes-tarefa">
                        <div class="card-header">
                            <h2>Informações da tarefa</h2>
                            <i class="bi bi-x-lg" onclick=FecharInformacoesTarefa'.$id_tarefa.'()></i>
                        </div>

                        <div class="card-main">
                            <div class="card-informacoes-tarefa-header">
                                <div>
                                    <h3>'.$nome_tarefa.'</h3>
                                    <p>Vence dia '.$data_vencimento.'</p>
                                </div>
                            </div>

                            <div class="input-group input-escopo">
                                <label>Descrição</label>
                                <textarea disabled>'.$descricao_tarefa.'</textarea>
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
                    informacoesTarefa.style.display = "block";
                }
            </script>
        ';
    }
?>