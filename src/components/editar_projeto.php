<?php
    if ($hierarquia == "VOLUNTÁRIO") {
        $sql = "SELECT * FROM PROJETOS P INNER JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
        $query_projeto = $mysqli -> query($sql);
    }

    elseif ($hierarquia == "COORDENADOR") {
        $sql = "SELECT * FROM PROJETOS P LEFT JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
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
            <section id="editarProjeto'.$id_projeto.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Editar projeto</h2>
                        <i class="bi bi-x-lg" onclick=FecharEditarProjeto'.$id_projeto.'()></i>
                    </div>

                    <form method="GET" action="../../functions/editar_projeto.php" class="modal-conteudo">
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_projeto" value="'.$id_projeto.'">

                        <div class="input-container">
                            <label class="label" for="inputNomeProjeto'.$id_projeto.'">Nome do projeto</label>
                            <input id="inputNomeProjeto'.$id_projeto.'" type="text" placeholder="Nome do projeto" name="nome_projeto" value="'.$nome_projeto.'" class="input fundo-cinza-claro" autocomplete="off" required>
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label" for="inputDataInicio'.$id_projeto.'">Data de início</label>
                                <input id="inputDataInicio'.$id_projeto.'" type="date" name="data_inicio" value="'.$data_inicio_projeto.'" class="input fundo-cinza-claro" required>
                            </div>

                            <div class="input-container">
                                <label class="label" for="inputDataTermino'.$id_projeto.'">Data de término</label>
                                <input id="inputDataTermino'.$id_projeto.'" type="date" name="data_termino" value="'.$data_termino_projeto.'" class="input fundo-cinza-claro" required>
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
                                        <input id="inputDiretor'.$id_projeto.'" type="text" placeholder="Nome do diretor" name="nome_diretor" value="'.$nome_diretor.'" class="input fundo-cinza-claro" list="listaDiretores" autocomplete="off" required>
                                    </div>

                                    <datalist id="listaDiretores">
                                         ';
                                            $sql = "SELECT U.NOME FROM USUARIOS U WHERE U.HIERARQUIA = 'DIRETOR'";
                                            $query_diretor = $mysqli -> query($sql);

                                            while ($row_diretor = $query_diretor -> fetch_assoc()) {
                                                $nome_usuario = $row_diretor["NOME"];
                                                echo '<option value="'.$nome_usuario.'">'.$nome_usuario.'</option>';
                                            }
                                        echo '
                                    </datalist>

                                    <div class="input-container">
                                        <label class="label" for="inputCoordenador'.$id_projeto.'">Coordenador Responsável</label>
                                        <input id="inputCoordenador'.$id_projeto.'" type="text" placeholder="Nome do coordenador" name="nome_coordenador" value="'.$nome_coordenador.'" class="input fundo-cinza-claro" list="listaCoordenadores" autocomplete="off" required>
                                    </div>

                                    <datalist id="listaCoordenadores">
                                        '; 
                                            $sql = "SELECT U.NOME FROM USUARIOS U WHERE U.HIERARQUIA = 'COORDENADOR'";
                                            $query_coordenador = $mysqli -> query($sql);

                                            while ($row_coordenador = $query_coordenador -> fetch_assoc()) {
                                                $nome_usuario = $row_coordenador["NOME"];
                                                echo '<option value="'.$nome_usuario.'">'.$nome_usuario.'</option>';
                                            }
                                        echo '
                                    </datalist>
                                </div>

                                <div class="input-container">
                                    <label class="label" for="inputLocal'.$id_projeto.'">Local</label>
                                    <input id="inputLocal'.$id_projeto.'" type="text" name="nome_local" placeholder="Nome do local" value="'.($nome_local ? $nome_local : '').'" class="input fundo-cinza-claro" list="listaLocais" autocomplete="off">

                                    <datalist id="listaLocais">
                                        '; 
                                            $sql = "SELECT L.NOME FROM LOCAIS L";
                                            $query_local = $mysqli -> query($sql);

                                            while ($row_local = $query_local -> fetch_assoc()) {
                                                $nome_local = $row_local["NOME"];
                                                echo '<option value="'.$nome_local.'">'.$nome_local.'</option>';
                                            }
                                        echo '
                                    </datalist>
                                </div>
                            ';
                        }

                        echo '<div class="input-container">
                            <label class="label" for="inputEscopo'.$id_projeto.'">Escopo</label>
                            <textarea id="inputEscopo'.$id_projeto.'" name="escopo" placeholder="Escopo do projeto" class="textarea fundo-cinza-claro" autocomplete="off">'.$escopo_projeto.'</textarea>
                        </div>';

                        if ($hierarquia != "VOLUNTARIO") {
                            $sql = "SELECT * FROM DOCUMENTOS U INNER JOIN PROJETOS P ON U.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                            $query_documento = $mysqli -> query($sql);
                            $quantidade_documentos = $query_documento -> num_rows;

                            echo '
                                <div class="input-container">
                                    <label class="label">Documentos ('.$quantidade_documentos.')</label>
                                    <button class="botao-grande fundo-preto"><i class="bi bi-plus-lg"></i> Adicionar documento</button>
                            ';

                            while ($row_documento = $query_documento -> fetch_assoc()) {
                                $nome_documento = $row_documento["NOME"];

                                echo '<div class="input-grupo">
                                        <input class="input fundo-cinza-claro" value="'.$nome_documento.'.pdf" disabled>
                                        <button class="botao-pequeno fundo-preto"><i class="bi bi-download"></i></button>
                                    </div>
                                </div>';
                            }

                            $sql = "SELECT E.NOME, E.QUANTIDADE_DISPONIVEL FROM EQUIPAMENTOS E INNER JOIN PROJETOS P ON E.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                            $query_equipamento = $mysqli -> query($sql);
                            $quantidade_equipamentos = $query_equipamento -> num_rows;

                            echo '
                                <div class="input-container">
                                    <label class="label">Equipamentos ('.$quantidade_equipamentos.')</label>
                                    <div class="input-grupo">
                                        <input class="input fundo-cinza-claro" placeholder="Nome do equipamento">
                                        <input class="input-pequeno fundo-cinza-claro" placeholder="Quantidade">
                                        <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                            ';

                            while ($row_equipamento = $query_equipamento -> fetch_assoc()) {
                                $nome_equipamento = $row_equipamento["NOME"];
                                $quantidade_equipamento_disponivel = $row_equipamento["QUANTIDADE_DISPONIVEL"];

                                echo '<div class="input-grupo">
                                    <input class="input fundo-cinza-claro" value="'.$nome_equipamento.' ('.$quantidade_equipamento_disponivel.')" disabled>
                                    <button class="botao-pequeno fundo-vermelho"><i class="bi bi-trash3-fill"></i></button>
                                </div>';
                            }

                            $sql = "SELECT SUM(R.VALOR) AS SOMA_RECURSO FROM RECURSOS R INNER JOIN PROJETOS P ON R.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                            $query_soma_recurso = $mysqli -> query($sql);
                            $row_soma_recurso = $query_soma_recurso -> fetch_assoc();
                            $soma_recurso = $row_soma_recurso["SOMA_RECURSO"];

                            echo '
                                </div>
                                <div class="input-container">
                                    <label class="label">Recursos (R$'.$soma_recurso.')</label>
                                    <div class="input-grupo">
                                        <input class="input fundo-cinza-claro" placeholder="Fonte do recurso">
                                        <input class="input-pequeno fundo-cinza-claro" placeholder="Valor">
                                        <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                            ';

                            $sql = "SELECT R.FONTE, R.VALOR FROM RECURSOS R INNER JOIN PROJETOS P ON R.ID_PROJETO = P.ID_PROJETO WHERE P.ID_PROJETO = '$id_projeto'";
                            $query_recurso = $mysqli -> query($sql);

                            while ($row_recurso = $query_recurso -> fetch_assoc()) {
                                $fonte_recurso = $row_recurso["FONTE"];
                                $valor_recurso = $row_recurso["VALOR"];

                                 echo '<div class="input-grupo">
                                    <input class="input fundo-cinza-claro" value="'.$fonte_recurso.' - R$ '.$valor_recurso.'" disabled>
                                    <button class="botao-pequeno fundo-vermelho"><i class="bi bi-trash3-fill"></i></button>
                                </div>';
                            }
                            
                            echo '</div>';
                        }

                    echo '
                        <button class="botao-form fundo-preto">Editar projeto</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharEditarProjeto'.$id_projeto.'() {
                    let editarProjeto = document.getElementById("editarProjeto'.$id_projeto.'");
                    editarProjeto.style.display = "none";
                }

                function AbrirEditarProjeto'.$id_projeto.'() {
                    let editarProjeto = document.getElementById("editarProjeto'.$id_projeto.'");
                    editarProjeto.style.display = "flex";
                }
            </script>
        ';
    }
?>