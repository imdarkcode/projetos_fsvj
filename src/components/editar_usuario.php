<?php
    $sql = "SELECT * FROM USUARIOS";
    $query_usuario_sistema = $mysqli -> query($sql);

    while ($row_usuario_sistema = $query_usuario_sistema -> fetch_assoc()) {
        $id_usuario_sistema = $row_usuario_sistema["ID_USUARIO"];
        $nome_usuario_sistema = $row_usuario_sistema["NOME"];
        $email_usuario_sistema = $row_usuario_sistema["EMAIL"];
        $senha_usuario_sistema = $row_usuario_sistema["SENHA"];
        $hierarquia_usuario_sistema = $row_usuario_sistema["HIERARQUIA"];

        echo '
            <section id="editarUsuario'.$id_usuario_sistema.'" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Editar usuário</h2>
                        <i class="bi bi-x-lg" onclick=FecharEditarUsuario'.$id_usuario_sistema.'()></i>
                    </div>

                    <form method="GET" action="../../functions/editar_usuario.php" class="modal-conteudo"> 
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_usuario_sistema" value="'.$id_usuario_sistema.'">

                        <div class="input-container">
                            <label class="label">Nome</label>
                            <input type="text" name="nome_usuario" class="input fundo-cinza-claro" placeholder="Nome do usuário" value="'.$nome_usuario_sistema.'" autocomplete="off" required>
                        </div>

                        <div class="input-container">
                            <label class="label">E-mail</label>
                            <input type="text" name="email_usuario" class="input fundo-cinza-claro" placeholder="E-mail do usuário" value="'.$email_usuario_sistema.'" autocomplete="off" required>
                        </div>

                        <div class="input-container">
                            <label class="label">Senha</label>
                            <input type="text" name="senha_usuario" class="input fundo-cinza-claro" placeholder="Senha do usuário" value="'.$senha_usuario_sistema.'" autocomplete="off" required>
                        </div>

                        <div class="input-container">
                            <label class="label">Cargo</label>
                            <select class="input fundo-cinza-claro" name="hierarquia_usuario">
                                <option value="VOLUNTÁRIO" '.($hierarquia_usuario_sistema == 'VOLUNTÁRIO' ? 'selected' : '').'>Voluntário</option>
                                <option value="COORDENADOR" '.($hierarquia_usuario_sistema == 'COORDENADOR' ? 'selected' : '').'>Coordenador</option>
                                <option value="DIRETOR" '.($hierarquia_usuario_sistema == 'DIRETOR' ? 'selected' : '').'>Diretor</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="botao-form fundo-preto">Editar</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharEditarUsuario'.$id_usuario_sistema.'() {
                    let editarUsuario = document.getElementById("editarUsuario'.$id_usuario_sistema.'");
                    editarUsuario.style.display = "none";
                }

                function AbrirEditarUsuario'.$id_usuario_sistema.'() {
                    let editarUsuario = document.getElementById("editarUsuario'.$id_usuario_sistema.'");
                    editarUsuario.style.display = "flex";
                }
            </script>
        ';
    }
?>