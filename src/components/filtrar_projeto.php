<section id="filtrarProjeto" class="fundo-modal">
    <div class="modal-pequeno">
        <div class="modal-header">
            <h2>Filtrar</h2>
            <i class="bi bi-x-lg" onclick=FecharFiltrarProjeto()></i>
        </div>

        <form class="modal-conteudo">
            <div class="input-container">
                <label class="label">Coordenador responsável</label>
                <select class="input">
                    <option>Todos</option>
                    <?php
                        $sql = "SELECT U.NOME FROM USUARIOS U WHERE U.HIERARQUIA = 'COORDENADOR' ";
                        $query_coordenador = $mysqli -> query($sql);

                        while($row_coordenador = $query_coordenador -> fetch_assoc()){
                            $nome_coordenador = $row_coordenador["NOME"];

                            echo '<option>'.$nome_coordenador.'</option>';
                        }
        
                    ?>
                </select>
            </div>

            <div class="input-container">
                <label class="label">Estado do projeto</label>
                <select class="input">
                    <option>Todos</option>
                    <option>Não iniciado</option>
                    <option>Em andamento</option>
                    <option>Concluído</option>
                </select>
            </div>

            <div class="input-container">
                <label class="label">Período</label>
                <div class="input-coluna">
                    <input type="date" class="input">
                    <input type="date" class="input">
                </div>
            </div>
            
            <button type="submit" class="botao-form fundo-preto">Filtrar</button>
        </form>
    </div>
</section>

<script>
    function FecharFiltrarProjeto() {
        let filtrarProjeto = document.getElementById("filtrarProjeto");
        filtrarProjeto.style.display = "none";
    }

    function AbrirFiltrarProjeto() {
        let filtrarProjeto = document.getElementById("filtrarProjeto");
        filtrarProjeto.style.display = "flex";
    }
</script>