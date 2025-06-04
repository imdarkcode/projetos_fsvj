<?php
    while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
        $id_tarefa = $row_tarefa["ID_TAREFA"];
        $nome_tarefa = $row_tarefa["NOME"];
        $descricao = $row_tarefa["DESCRICAO"];
        $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
        $estado_tarefa = $row_tarefa["ESTADO"];
        $tarefa_estado_classe = ($estado_tarefa == "A FAZER") ? 'a-fazer' : (($estado_tarefa == "EM ANDAMENTO") ? 'em-andamento' : 'concluida');

        echo '
            <div class="kanban-tarefa" onclick="AbrirInformacoesTarefa'.$id_tarefa.'()">
                <div class="tarefa-estado '.$tarefa_estado_classe.'"></div>
                <h3>'.$nome_tarefa.'</h3>
                <p>'.$descricao.'</p>
                <span class="data-tarefa">'.$data_vencimento.'</span>
            </div>
        ';
    }
?>