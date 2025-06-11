<?php
    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO != '$id_usuario'";
    $query_usuario_sistema = $mysqli -> query($sql);

    while ($row_usuario_sistema = $query_usuario_sistema -> fetch_assoc()) {
        $id_usuario_sistema = $row_usuario_sistema["ID_USUARIO"];
        $nome_usuario_sistema = $row_usuario_sistema["NOME"];

        echo '
            <section id="excluirUsuario'.$id_usuario_sistema.'" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Aviso de exclusão</h2>
                        <i class="bi bi-x-lg" onclick=FecharExcluirUsuario'.$id_usuario_sistema.'()></i>
                    </div>

                    <form method="GET" action="../../functions/excluir_usuario.php" class="modal-conteudo"> 
                        <div class="modal-aviso">
                            <h3>Atenção</h3>
                            <p>Deseja excluir o usuário '.$nome_usuario_sistema.'? Não será possível reverter esta ação após ser concluída.</p>   
                        </div>
                        
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_usuario_sistema" value="'.$id_usuario_sistema.'">
                        
                        <button type="submit" class="botao-form fundo-vermelho">Excluir</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharExcluirUsuario'.$id_usuario_sistema.'() {
                    let excluirUsuario = document.getElementById("excluirUsuario'.$id_usuario_sistema.'");
                    excluirUsuario.style.display = "none";
                }

                function AbrirExcluirUsuario'.$id_usuario_sistema.'() {
                    let excluirUsuario = document.getElementById("excluirUsuario'.$id_usuario_sistema.'");
                    excluirUsuario.style.display = "flex";
                }
            </script>
        ';
    }
?>