<section id="adicionarUsuario" class="fundo-modal">
    <div class="modal-pequeno">
        <div class="modal-header">
            <h2>Adicionar usuário</h2>
            <i class="bi bi-x-lg" onclick=FecharAdicionarUsuario()></i>
        </div>

        <form method="GET" action="../../functions/adicionar_usuario.php" class="modal-conteudo"> 
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

            <div class="input-container">
                <label class="label">Nome</label>
                <input type="text" name="nome_usuario" class="input fundo-cinza-claro" placeholder="Nome do usuário" autocomplete="off" required>
            </div>

            <div class="input-container">
                <label class="label">E-mail</label>
                <input type="text" name="email_usuario" class="input fundo-cinza-claro" placeholder="E-mail do usuário" autocomplete="off" required>
            </div>

            <div class="input-container">
                <label class="label">Senha</label>
                <input type="text" name="senha_usuario" class="input fundo-cinza-claro" placeholder="Senha do usuário" autocomplete="off" required>
            </div>

            <div class="input-container">
                <label class="label">Cargo</label>
                <select class="input fundo-cinza-claro" name="hierarquia_usuario">
                    <option value="VOLUNTÁRIO" selected>Voluntário</option>
                    <option value="COORDENADOR">Coordenador</option>
                    <option value="DIRETOR">Diretor</option>
                </select>
            </div>
            
            <button type="submit" class="botao-form fundo-preto">Adicionar</button>
        </form>
    </div>
</section>

<script>
    function FecharAdicionarUsuario() {
        let adicionarUsuario = document.getElementById("adicionarUsuario");
        adicionarUsuario.style.display = "none";
    }

    function AbrirAdicionarUsuario() {
        let adicionarUsuario = document.getElementById("adicionarUsuario");
        adicionarUsuario.style.display = "flex";
    }
</script>