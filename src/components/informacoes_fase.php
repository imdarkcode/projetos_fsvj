<?php
    $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESTADO AS ESTADO_FASE FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
    $query_projeto_fase = $mysqli -> query($sql);

    $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
    $id_coordenador = $row_projeto_fase["ID_COORDENADOR"];
        
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
                            <input type="text" class="input" disabled>
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Data de início</label>
                                <input type="text" class="input" disabled>
                            </div>

                            <div class="input-container">
                                <label class="label">Data de termino</label>
                                <input type="text" class="input" disabled>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Escopo</label>
                            <textarea class="textarea"></textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Gastos</label>
                            <input type="text" class="input" disabled>
                        </div>

                        <div class="input-container">
                            <label class="label">Equipamentos utilizados</label>
                            <input type="text" class="input" disabled>
                        </div>
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