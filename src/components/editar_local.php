<?php
    $sql = "SELECT * FROM LOCAIS L INNER JOIN ENDERECOS";
    $query_local_endereco = $mysqli -> query($sql);

    while ($row_local_endereco = $query_local_endereco -> fetch_assoc()) {
        $id_local = $row_local_endereco["ID_LOCAL"];
        $nome_local = $row_local_endereco["NOME"];
        $rua = $row_local_endereco["RUA"];
        $bairro = $row_local_endereco["BAIRRO"];
        $numero = $row_local_endereco["NUMERO"];
        $cidade = $row_local_endereco["CIDADE"];
        $cep = $row_local_endereco["CEP"];

        echo '
            <section id="editarLocal'.$id_local.'" class="fundo-modal">
                <div class="modal-pequeno">
                    <div class="modal-header">
                        <h2>Editar local</h2>
                        <i class="bi bi-x-lg" onclick=FecharEditarLocal'.$id_local.'()></i>
                    </div>

                    <form method="GET" action="../../functions/editar_local.php" class="modal-conteudo"> 
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_local" value="'.$id_local.'">

                        <div class="input-container">
                            <label class="label">Nome do local</label>
                            <input type="text" name="nome_local" class="input fundo-cinza-claro" placeholder="Ex: Edídula São Martins" value="'.$nome_local.'">
                        </div>

                        <div class="input-container">
                            <label class="label">Rua</label>
                            <input type="text" name="rua" class="input fundo-cinza-claro" placeholder="Ex: Rua das Flores" value="'.$rua.'">
                        </div>

                        <div class="input-container">
                            <label class="label">Bairro</label>
                            <input type="text" name="bairro" class="input fundo-cinza-claro" placeholder="Ex: Centro" value="'.$bairro.'">
                        </div>

                        <div class="input-container">
                            <label class="label">Número</label>
                            <input type="text" name="numero" class="input fundo-cinza-claro" placeholder="Ex: 123" value="'.$numero.'">
                        </div>

                         <div class="input-container">
                            <label class="label">Cidade</label>
                            <input type="text" name="cidade" class="input fundo-cinza-claro" placeholder="Ex: Taquaritinga" value="'.$cidade.'">
                        </div>

                         <div class="input-container">
                            <label class="label">CEP</label>
                            <input type="text" name="cep" class="input fundo-cinza-claro" placeholder="Ex: 15900-000" value="'.$cep.'">
                        </div>
                        
                        <button type="submit" class="botao-form fundo-preto">Editar</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharEditarLocal'.$id_local.'() {
                    let editarLocal = document.getElementById("editarLocal'.$id_local.'");
                    editarLocal.style.display = "none";
                }

                function AbrirEditarLocal'.$id_local.'() {
                    let editarLocal = document.getElementById("editarLocal'.$id_local.'");
                    editarLocal.style.display = "flex";
                }
            </script>
        ';
    }
?>