<?php
    if ($hierarquia == "VOLUNTÁRIO") {
        $sql = "SELECT DISTINCT P.ID_PROJETO, P.ID_COORDENADOR, P.NOME FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
        $query_projeto = $mysqli -> query($sql);
    }

    elseif ($hierarquia == "COORDENADOR") {
        $sql = "SELECT DISTINCT P.ID_PROJETO, P.ID_COORDENADOR, P.NOME FROM PROJETOS P LEFT JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
        $query_projeto = $mysqli -> query($sql);
    }

    else {
        $sql = "SELECT * FROM PROJETOS P";
        $query_projeto = $mysqli -> query($sql);
    }

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];
        $id_coordenador = $row_projeto["ID_COORDENADOR"];
        $nome_projeto = $row_projeto["NOME"];

        $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_coordenador'";
        $query_coordenador = $mysqli -> query($sql);
        $row_coordenador = $query_coordenador -> fetch_assoc();

        $nome_coordenador = $row_coordenador["NOME"];

        echo '
            <section id="projeto'.$id_projeto.'" class="projeto-container">
                <div class="projeto-header">
                    <div class="titulo-projeto">
                        <h2>'.$nome_projeto.'</h2>
                        <p>'.$nome_coordenador.'</p>
                    </div>
                    <div class="botoes-projeto">
                        '.($hierarquia == "DIRETOR" ? '<button id="btnExcluirProjeto'.$id_projeto.'" onclick="AbrirExcluirProjeto'.$id_projeto.'()"><i class="bi bi-trash3-fill"></i></button>' : '').'
                        '.($hierarquia == "COORDENADOR" ? '<button id="btnAdcionarFase'.$id_projeto.'" onclick="AdicionarFase()"><i class="bi bi-plus-lg"></i></button>' : '').'
                        '.($hierarquia == "DIRETOR" ? '<button id="btnEditarProjeto'.$id_projeto.'" onclick="AbrirEditarProjeto'.$id_projeto.'()"><i class="bi bi-sliders"></i></button>' : '').'
                        '.($hierarquia != "VOLUNTÁRIO" ? '<button id="btnParticipantesProjeto'.$id_projeto.'" onclick="AbrirParticipantesProjeto'.$id_projeto.'()"><i class="bi bi-people-fill"></i></button>' : '').'

                        <button onclick="AbrirInformacoesProjeto'.$id_projeto.'()"><i class="bi bi-info"></i></button>
                        <button id="btnExibirFases'.$id_projeto.'" onclick="ExibirFases'.$id_projeto.'()"><i class="bi bi-caret-down-fill"></i></button>
                        <button id="btnEsconderFases'.$id_projeto.'" class="btnEsconderFases" onclick="EsconderFases'.$id_projeto.'()"><i class="bi bi-caret-up-fill"></i></button>
                    </div>                      
                </div>

                <div class="progresso-container">';
                    $sql = "SELECT * FROM FASES F WHERE F.ID_PROJETO = '$id_projeto'";
                    $query_fase = $mysqli -> query($sql);

                    while ($row_fase = $query_fase -> fetch_assoc()) {
                        $estado_fase = $row_fase["ESTADO"];

                        if ($estado_fase == "Concluída") {
                            echo '<div class="progresso progresso-cheio"></div>';
                        }
                        else {
                            echo '<div class="progresso progresso-vazio"></div>';
                        }
                    }
                echo '</div>                 
            </section>

            <section id="fasesProjeto'.$id_projeto.'" class="fases-container">';
                $sql = "SELECT * FROM FASES F WHERE F.ID_PROJETO = '$id_projeto'";
                $query_fase = $mysqli -> query($sql);
                $contador = $query_fase -> num_rows;

                while ($row_fase = $query_fase -> fetch_assoc()) {
                    $id_fase = $row_fase["ID_FASE"];
                    $nome_fase = $row_fase["NOME"];
                    $estado_fase = $row_fase["ESTADO"];

                    echo '
                        <div class="fase">
                            <div>
                                <h2>'.$nome_fase.'</h2>
                                <p>'.$estado_fase.'</p>
                            </div>
                            <div class="link-tarefas">
                                <a href="../fase/fase.php?id_usuario='.$id_usuario.'&id_fase='.$id_fase.'">Ver Tarefas<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    ';

                    if ($contador > 1) {
                        echo '<div class="fase-divisor"></div>';
                        $contador -= 1;
                    }
                }
            echo '</section>

            <script>
                function ExibirFases'.$id_projeto.'() {
                    let fasesProjeto = document.getElementById("fasesProjeto'.$id_projeto.'");
                    let btnExibirFases = document.getElementById("btnExibirFases'.$id_projeto.'");
                    let btnEsconderFases = document.getElementById("btnEsconderFases'.$id_projeto.'");

                    btnExibirFases.style.display = "none";
                    btnEsconderFases.style.display = "block";
                    fasesProjeto.style.display = "block"
                }

                function EsconderFases'.$id_projeto.'() {
                    let fasesProjeto = document.getElementById("fasesProjeto'.$id_projeto.'");
                    let btnExibirFases = document.getElementById("btnExibirFases'.$id_projeto.'");
                    let btnEsconderFases = document.getElementById("btnEsconderFases'.$id_projeto.'");

                    btnExibirFases.style.display = "block";
                    btnEsconderFases.style.display = "none";
                    fasesProjeto.style.display = "none"
                }
            </script>
        ';
    }
?>