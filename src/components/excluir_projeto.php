<?php
    $sql = "SELECT P.ID_PROJETO, P.NOME FROM PROJETOS P";
    $query_projeto = $mysqli -> query($sql);

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        $id_projeto = $row_projeto["ID_PROJETO"];
        $nome_projeto = $row_projeto["NOME"];

        echo '
            <section id="excluirProjeto'.$id_projeto.'" class="excluir-projeto">
                <div class="fundo-escuro">
                    <div class="card-excluir-projeto">
                        <div class="card-excluir-header">
                            <h2>Aviso de exclusão</h2>
                            <i class="bi bi-x-lg" onclick=FecharExcluirProjeto'.$id_projeto.'()></i>
                        </div>

                        <div class="card-excluir-main">
                            <form class="form">
                                <h3>Atenção</h3>
                                <p>Deseja excluir este o projeto '.$nome_projeto.'? Não será possível reverter esta ação após ser concluída.</p>   
                                <input type="hidden" value="'.$id_projeto.'"> 
                                
                                <button type="submit" class="botao-texto botao-vermelho">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function FecharExcluirProjeto'.$id_projeto.'() {
                    let excluirProjeto = document.getElementById("excluirProjeto'.$id_projeto.'");
                    excluirProjeto.style.display = "none";
                }

                function AbrirExcluirProjeto'.$id_projeto.'() {
                    let excluirProjeto = document.getElementById("excluirProjeto'.$id_projeto.'");
                    excluirProjeto.style.display = "block";
                }
            </script>
        ';
    }
?>