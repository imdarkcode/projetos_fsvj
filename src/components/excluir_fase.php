<?php
    $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESCOPO AS ESCOPO_FASE, F.DATA_INICIO, F.DATA_TERMINO FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
    $query_projeto_fase = $mysqli -> query($sql);

    $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
    $nome_fase = $row_projeto_fase["NOME_FASE"];

        
        echo '
            <section id="excluirFase" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Aviso de exclusão</h2>
                        <i class="bi bi-x-lg" onclick=FecharExcluirFase()></i>
                    </div>

                    <form method="GET" action="../../functions/excluir_fase.php" class="modal-conteudo"> 
                        <div class="modal-aviso">
                            <h3>Aviso</h3>
                            <p>Deseja excluir a fase '.$nome_fase.'? Não será possível reverter esta ação após ser concluída.</p>
                        </div>

                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'"> 
                        <input type="hidden" name="id_fase" value="'.$id_fase.'"> 

                        <button type="submit" class="botao-form fundo-vermelho">Excluir</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharExcluirFase() {
                    let excluirFase = document.getElementById("excluirFase");
                    excluirFase.style.display = "none";
                }

                function AbrirExcluirFase() {
                    let excluirFase = document.getElementById("excluirFase");
                    excluirFase.style.display = "flex";
                }
            </script>
        ';
?>