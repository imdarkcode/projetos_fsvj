<?php
    if ($hierarquia == "VOLUNTÁRIO") {
        $sql = "SELECT DISTINCT P.ID_PROJETO, P.ID_COORDENADOR FROM PROJETOS P INNER JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
        $query_projeto = $mysqli -> query($sql);
    }

    elseif ($hierarquia == "COORDENADOR") {
        $sql = "SELECT DISTINCT P.ID_PROJETO, P.ID_COORDENADOR FROM PROJETOS P LEFT JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
        $query_projeto = $mysqli -> query($sql);
    }

    else {
        $sql = "SELECT * FROM PROJETOS P";
        $query_projeto = $mysqli -> query($sql);
    }

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];
        $id_coordenador = $row_projeto["ID_COORDENADOR"];

        $sql = "SELECT U.ID_USUARIO, U.NOME, U.HIERARQUIA FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO INNER JOIN USUARIOS U ON UP.ID_USUARIO = U.ID_USUARIO WHERE P.ID_PROJETO = '$id_projeto'";
        $query_participantes = $mysqli -> query($sql);
        $quantidade_participantes = $query_participantes -> num_rows + 1;
        $contador = $quantidade_participantes;
        
        echo '
            <section id="participantesProjeto'.$id_projeto.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Participantes do projeto</h2>
                        <i class="bi bi-x-lg" onclick=FecharParticipantesProjeto'.$id_projeto.'()></i>
                    </div>

                    <div class="modal-conteudo">
                        <div class="card-participantes-titulo">
                            <h3 class="titulo-grande">Participantes</h3>
                            <p class="sub-titulo">Total de participantes: '.$quantidade_participantes.'</p>
                        </div>';

                    if ($id_coordenador == $id_usuario) {
                        echo '
                            <form method="GET" action="../../functions/participantes_projeto.php" class="input-container">
                                <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                <input type="hidden" name="id_projeto" value="'.$id_projeto.'">

                                <label class="label">Adicionar participantes</label>
                                <div class="input-grupo">
                                    <input class="input fundo-cinza-claro" type="text" name="nome_participante" placeholder="Nome do usuário">
                                    <button type="submit" class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                                </div>
                                <p class="mensagem-erro"><i class="bi bi-exclamation-circle-fill"></i> Usuário não encontrado</p>
                            </form>
                        ';
                    }

                    echo '
                        <div class="card-participantes-usuario">
                            <div>
                                <h4 class="label">'.$nome_coordenador.' '.($id_coordenador == $id_usuario ? '(você)' : '').'</h4>
                                <p class="sub-titulo primeira-letra-maiuscula">Coordenador</p>
                            </div>
                        </div>
                    ';

                    if ($contador > 1) {
                        echo '
                            <div class="divisor fundo-cinza"></div>
                        ';
                        $contador -= 1;
                    }

                    while ($row_participantes = $query_participantes -> fetch_assoc()) {
                        $id_participante = $row_participantes["ID_USUARIO"];
                        $nome_participante = $row_participantes["NOME"];
                        $hierarquia_participante = $row_participantes["HIERARQUIA"];

                        echo '
                            <div class="elemento-lista">
                                <div class="elemento-titulo">
                                    <h4 class="label">'.$nome_participante.'</h4>
                                    <p class="sub-titulo primeira-letra-maiuscula">'.$hierarquia_participante.'</p>
                                </div>
                                <button class="botao-pequeno fundo-vermelho"><i class="bi bi-person-dash-fill"></i></button>
                            </div>
                        ';

                        if ($contador > 1) {
                            echo '
                                <div class="divisor fundo-cinza"></div>
                            ';
                            $contador -= 1;
                        }
                    }

                        
                    echo '</div>
                </div>
            </section>

            <script>
                function FecharParticipantesProjeto'.$id_projeto.'() {
                    let participantesProjeto = document.getElementById("participantesProjeto'.$id_projeto.'");
                    participantesProjeto.style.display = "none";
                }

                function AbrirParticipantesProjeto'.$id_projeto.'() {
                    let participantesProjeto = document.getElementById("participantesProjeto'.$id_projeto.'");
                    participantesProjeto.style.display = "flex";
                }
            </script>
        ';
    }
?>