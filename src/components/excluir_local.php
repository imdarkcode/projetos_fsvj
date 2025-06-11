<?php
    $sql = "SELECT * FROM LOCAIS L";
    $query_local = $mysqli -> query($sql);

    while ($row_local = $query_local -> fetch_assoc()) {
        $id_local = $row_local["ID_LOCAL"];
        $nome_local = $row_local["NOME"];

        echo '
            <section id="excluirLocal'.$id_local.'" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Aviso de exclusão</h2>
                        <i class="bi bi-x-lg" onclick=FecharExcluirLocal'.$id_local.'()></i>
                    </div>

                    <form method="GET" action="../../functions/excluir_local.php" class="modal-conteudo"> 
                        <div class="modal-aviso">
                            <h3>Atenção</h3>
                            <p>Deseja excluir o local '.$nome_local.'? Não será possível reverter esta ação após ser concluída.</p>   
                        </div>
                        
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_local" value="'.$id_local.'">
                        
                        <button type="submit" class="botao-form fundo-vermelho">Excluir</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharExcluirLocal'.$id_local.'() {
                    let excluirLocal = document.getElementById("excluirLocal'.$id_local.'");
                    excluirLocal.style.display = "none";
                }

                function AbrirExcluirLocal'.$id_local.'() {
                    let excluirLocal = document.getElementById("excluirLocal'.$id_local.'");
                    excluirLocal.style.display = "flex";
                }
            </script>
        ';
    }
?>