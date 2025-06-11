<section id="adicionarLocal" class="fundo-modal">
    <div class="modal-pequeno">
        <div class="modal-header">
            <h2>Adicionar local</h2>
            <i class="bi bi-x-lg" onclick=FecharAdicionarLocal()></i>
        </div>

        <form method="GET" action="../../functions/adicionar_local.php" class="modal-conteudo"> 
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

            <div class="input-container">
                <label class="label">Nome do local</label>
                <input type="text" name="nome_local" class="input fundo-cinza-claro" placeholder="Ex: Edídula São Martins">
            </div>

            <div class="input-container">
                <label class="label">Rua</label>
                <input type="text" name="rua" class="input fundo-cinza-claro" placeholder="Ex: Rua das Flores">
            </div>

            <div class="input-container">
                <label class="label">Bairro</label>
                <input type="text" name="bairro" class="input fundo-cinza-claro" placeholder="Ex: Centro">
            </div>

            <div class="input-container">
                <label class="label">Número</label>
                <input type="text" name="numero" class="input fundo-cinza-claro" placeholder="Ex: 123">
            </div>

                <div class="input-container">
                <label class="label">Cidade</label>
                <input type="text" name="cidade" class="input fundo-cinza-claro" placeholder="Ex: Taquaritinga">
            </div>

                <div class="input-container">
                <label class="label">CEP</label>
                <input type="text" name="cep" class="input fundo-cinza-claro" placeholder="Ex: 15900-000">
            </div>
            
            <button type="submit" class="botao-form fundo-preto">Adicionar</button>
        </form>
    </div>
</section>

<script>
    function FecharAdicionarLocal() {
        let adicionarLocal = document.getElementById("adicionarLocal");
        adicionarLocal.style.display = "none";
    }

    function AbrirAdicionarLocal() {
        let adicionarLocal = document.getElementById("adicionarLocal");
        adicionarLocal.style.display = "flex";
    }
</script>