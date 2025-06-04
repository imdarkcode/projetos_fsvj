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

        $sql = "SELECT DISTINCT U.NOME, U.HIERARQUIA FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO INNER JOIN USUARIOS U ON UP.ID_USUARIO = U.ID_USUARIO WHERE P.ID_PROJETO = '$id_projeto'";
        $query_participantes = $mysqli -> query($sql);
        $quantidade_participantes = $query_participantes -> num_rows + 1;
        $contador = $quantidade_participantes;
        
        echo '
            <section id="participantesProjeto'.$id_projeto.'" class="particiantes-projeto">
                <div class="fundo-escuro">
                    <div class="card-particiantes-projeto">
                        <div class="card-participantes-header">
                            <h2>Participantes do projeto</h2>
                            <i class="bi bi-x-lg" onclick=FecharParticipantesProjeto'.$id_projeto.'()></i>
                        </div>

                        <div class="card-participantes-main">
                            <div class="card-participantes-titulo">
                                <h2>Participantes</h2>
                                <p>Total de participantes: '.$quantidade_participantes.'</p>
                            </div>';

                        if ($id_coordenador == $id_usuario) {
                            echo '
                                <div class="card-participantes-input-adicionar">
                                    <label>Adicionar participantes</label>
                                    <div><input placeholder="Nome do usuário"><button><i class="bi bi-plus-lg"></i></button></div>
                                    <p><i class="bi bi-exclamation-circle-fill"></i> Usuário não encontrado</p>
                                </div>
                            ';
                        }

                        echo '
                            <div class="card-participantes-usuario">
                                <div>
                                    <h3>'.$nome_coordenador.' '.($id_coordenador == $id_usuario ? '(você)' : '').'</h3>
                                    <p>Coordenador</p>
                                </div>
                            </div>
                        ';

                        if ($contador > 1) {
                            echo '
                                <div class="card-participantes-divisor"></div>
                            ';
                            $contador -= 1;
                        }

                        while ($row_participantes = $query_participantes -> fetch_assoc()) {
                            $nome_participante = $row_participantes["NOME"];
                            $hierarquia_participante = $row_participantes["HIERARQUIA"];

                            echo '
                                <div class="card-participantes-usuario">
                                    <div>
                                        <h3>'.$nome_participante.' '.($id_coordenador == $id_usuario ? '(você)' : '').'</h3>
                                        <p>'.$hierarquia_participante.'</p>
                                    </div>
                                    <button><i class="bi bi-person-dash-fill"></i></button>
                                </div>
                            ';

                            if ($contador > 1) {
                                echo '
                                    <div class="card-participantes-divisor"></div>
                                ';
                                $contador -= 1;
                            }
                        }

                            
                        echo '</div>
                    </div>
                </div>
            </section>

            <script>
                function FecharParticipantesProjeto'.$id_projeto.'() {
                    let participantesProjeto = document.getElementById("participantesProjeto'.$id_projeto.'");
                    participantesProjeto.style.display = "none";
                }

                function AbrirParticipantesProjeto'.$id_projeto.'() {
                    let participantesProjeto = document.getElementById("participantesProjeto'.$id_projeto.'");
                    participantesProjeto.style.display = "block";
                }
            </script>
        ';
    }
?>