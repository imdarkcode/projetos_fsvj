<?php
    if ($hierarquia == "VOLUNTÁRIO") {
        $sql = "SELECT P.ID_PROJETO, P.ID_COORDENADOR, P.ID_DIRETOR, P.ID_LOCAL, P.NOME, P.DATA_INICIO, P.DATA_TERMINO, P.ESCOPO FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
        $query_projeto = $mysqli -> query($sql);
    }

    elseif ($hierarquia == "COORDENADOR") {
        $sql = "SELECT P.ID_PROJETO, P.ID_COORDENADOR, P.ID_DIRETOR, P.ID_LOCAL, P.NOME, P.DATA_INICIO, P.DATA_TERMINO, P.ESCOPO FROM PROJETOS P LEFT JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
        $query_projeto = $mysqli -> query($sql);
    }

    else {
        $sql = "SELECT * FROM PROJETOS P";
        $query_projeto = $mysqli -> query($sql);
    }

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];
        $id_coordenador = $row_projeto["ID_COORDENADOR"];
        $id_diretor = $row_projeto["ID_DIRETOR"];
        $id_local = $row_projeto["ID_LOCAL"];
        $nome_projeto = $row_projeto["NOME"];
        $data_inicio_projeto = $row_projeto["DATA_INICIO"];
        $data_termino_projeto = $row_projeto["DATA_TERMINO"];
        $escopo_projeto = $row_projeto["ESCOPO"];
        
        echo '
            <section id="informacoesProjeto'.$id_projeto.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Informações do projeto</h2>
                        <i class="bi bi-x-lg" onclick=FecharInformacoesProjeto'.$id_projeto.'()></i>
                    </div>

                    <div class="modal-conteudo">
                            <div class="input-container">
                                <label class="label" for="inputNomeProjeto'.$id_projeto.'">Nome do projeto</label>
                                <input id="inputNomeProjeto'.$id_projeto.'" type="text" value="'.$nome_projeto.'" class="input" disabled>
                            </div>

                            <div class="input-coluna">
                                <div class="input-container">
                                    <label class="label" for="inputDataInicio'.$id_projeto.'">Data de início</label>
                                    <input id="inputDataInicio'.$id_projeto.'" type="date" value="'.$data_inicio_projeto.'" class="input" disabled>
                                </div>

                                <div class="input-container">
                                    <label class="label" for="inputDataTermino'.$id_projeto.'">Data de término</label>
                                    <input id="inputDataTermino'.$id_projeto.'" type="date" value="'.$data_termino_projeto.'" class="input" disabled>
                                </div>
                            </div>';

                            if ($hierarquia != "VOLUNTARIO") {
                                $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_coordenador'";
                                $query_coordenador = $mysqli -> query($sql);
                                $row_coordenador = $query_coordenador -> fetch_assoc();

                                $nome_coordenador = $row_coordenador["NOME"];

                                $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_diretor'";
                                $query_diretor = $mysqli -> query($sql);
                                $row_diretor = $query_diretor -> fetch_assoc();

                                $nome_diretor = $row_diretor["NOME"];

                                $sql = "SELECT * FROM LOCAIS L WHERE L.ID_LOCAL = '$id_local'";
                                $query_local = $mysqli -> query($sql);
                                $nome_local = NULL;

                                if ($query_local -> num_rows > 0) {
                                    $row_local = $query_local -> fetch_assoc();

                                    $nome_local = $row_local["NOME"];
                                }

                                echo '
                                    <div class="input-coluna">
                                        <div class="input-container">
                                            <label class="label" for="inputDiretor'.$id_projeto.'">Diretor Responsável</label>
                                            <input id="inputDiretor'.$id_projeto.'" type="text" value="'.$nome_diretor.'" class="input" disabled>
                                        </div>

                                        <div class="input-container">
                                            <label class="label" for="inputCoordenador'.$id_projeto.'">Coordenador Responsável</label>
                                            <input id="inputCoordenador'.$id_projeto.'" type="text" value="'.$nome_coordenador.'" class="input" disabled>
                                        </div>
                                    </div>

                                    <div class="input-container">
                                        <label class="label" for="inputLocal'.$id_projeto.'">Local</label>
                                        <input id="inputLocal'.$id_projeto.'" type="text" value="'.($nome_local ? $nome_local : '').'" class="input" disabled>
                                    </div>
                                ';
                            }

                            echo '<div class="input-container">
                                <label class="label" for="inputEscopo'.$id_projeto.'">Escopo</label>
                                <textarea id="inputEscopo'.$id_projeto.'" class="textarea" disabled>'.$escopo_projeto.'</textarea>
                            </div>';

                            if ($hierarquia != "VOLUNTÁRIO") {
                                $sql = "SELECT * FROM DOCUMENTOS U INNER JOIN PROJETOS P ON U.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                                $query_documento = $mysqli -> query($sql);
                                $quantidade_documentos = $query_documento -> num_rows;

                                echo '
                                    <div class="input-container">
                                        <label class="label">Documentos ('.$quantidade_documentos.')</label>
                                ';

                                while ($row_documento = $query_documento -> fetch_assoc()) {
                                    $nome_documento = $row_documento["NOME"];

                                    echo '<div class="input-grupo">
                                            <input class="input" value="'.$nome_documento.'.pdf" disabled>
                                            <button class="botao-pequeno botao-preto"><i class="bi bi-download"></i></button>
                                        </div>
                                    </div>';
                                }

                                $sql = "SELECT E.NOME, E.QUANTIDADE_DISPONIVEL FROM EQUIPAMENTOS E INNER JOIN PROJETOS P ON E.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                                $query_equipamento = $mysqli -> query($sql);
                                $quantidade_equipamentos = $query_equipamento -> num_rows;

                                echo '
                                    <div class="input-container">
                                        <label class="label">Equipamentos ('.$quantidade_equipamentos.')</label>
                                ';

                                while ($row_equipamento = $query_equipamento -> fetch_assoc()) {
                                    $nome_equipamento = $row_equipamento["NOME"];
                                    $quantidade_equipamento_disponivel = $row_equipamento["QUANTIDADE_DISPONIVEL"];

                                    echo '<input class="input" value="'.$nome_equipamento.' ('.$quantidade_equipamento_disponivel.')" disabled>';
                                }

                                $sql = "SELECT SUM(R.VALOR) AS SOMA_RECURSO FROM RECURSOS R INNER JOIN PROJETOS P ON R.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                                $query_soma_recurso = $mysqli -> query($sql);
                                $row_soma_recurso = $query_soma_recurso -> fetch_assoc();
                                $soma_recurso = $row_soma_recurso["SOMA_RECURSO"];

                                echo '
                                    </div>
                                    <div class="input-container">
                                        <label class="label">Recursos (R$'.$soma_recurso.')</label>
                                ';

                                $sql = "SELECT R.FONTE, R.VALOR FROM RECURSOS R INNER JOIN PROJETOS P ON R.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                                $query_recurso = $mysqli -> query($sql);

                                while ($row_recurso = $query_recurso -> fetch_assoc()) {
                                    $fonte_recurso = $row_recurso["FONTE"];
                                    $valor_recurso = $row_recurso["VALOR"];

                                    echo '<input class="input" value="'.$fonte_recurso.' - R$ '.$valor_recurso.'" disabled>';
                                }
                                
                                echo '</div>';
                            }

                        echo '</div>
                    </div>
                </div>
            </section>

            <script>
                function FecharInformacoesProjeto'.$id_projeto.'() {
                    let informacoesProjeto = document.getElementById("informacoesProjeto'.$id_projeto.'");
                    informacoesProjeto.style.display = "none";
                }

                function AbrirInformacoesProjeto'.$id_projeto.'() {
                    let informacoesProjeto = document.getElementById("informacoesProjeto'.$id_projeto.'");
                    informacoesProjeto.style.display = "flex";
                }
            </script>
        ';
    }
?>