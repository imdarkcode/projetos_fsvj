<?php
    $sql = "SELECT P.ID_PROJETO, P.NOME FROM PROJETOS P";
    $query_projeto = $mysqli -> query($sql);

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];
        $nome_projeto = $row_projeto["NOME"];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_projeto = $_POST['id_projeto'];

            $sql = "DROP TABLE PROJETOS P WHERE P.ID_PROJETO = '$id_projeto'";
            $mysqli -> query($sql);
        }

        echo '
            <section id="excluirProjeto'.$id_projeto.'" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Aviso de exclusão</h2>
                        <i class="bi bi-x-lg" onclick=FecharExcluirProjeto'.$id_projeto.'()></i>
                    </div>

                    <form method="GET" action="../../functions/excluir_projeto.php" class="modal-conteudo"> 
                        <div class="modal-aviso">
                            <h3>Atenção</h3>
                            <p>Deseja excluir este o projeto '.$nome_projeto.'? Não será possível reverter esta ação após ser concluída.</p>   
                        </div>
                        
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'"> 
                        <input type="hidden" name="id_projeto" value="'.$id_projeto.'"> 
                        
                        <button type="submit" class="botao-form fundo-vermelho">Excluir</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharExcluirProjeto'.$id_projeto.'() {
                    let excluirProjeto = document.getElementById("excluirProjeto'.$id_projeto.'");
                    excluirProjeto.style.display = "none";
                }

                function AbrirExcluirProjeto'.$id_projeto.'() {
                    let excluirProjeto = document.getElementById("excluirProjeto'.$id_projeto.'");
                    excluirProjeto.style.display = "flex";
                }
            </script>
        ';
    }
?>