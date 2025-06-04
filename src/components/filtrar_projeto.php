<section id="filtrarProjeto" class="filtrar-projeto">
    <div class="fundo-escuro">
        <div class="card-filtrar-projeto">
            <div class="card-filtrar-header">
                <h2>Filtrar</h2>
                <i class="bi bi-x-lg" onclick=FecharFiltrarProjeto()></i>
            </div>

            <div class="card-filtrar-main">
                <form class="form">
                    <div class="input-group select-coordenador-projeto">
                        <label>Coordenador responsável</label>
                        <select>
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

                    <div class="input-group select-estado-projeto">
                        <label>Estado do projeto</label>
                        <select>
                            <option>Todos</option>
                            <option>Não iniciado</option>
                            <option>Em andamento</option>
                            <option>Concluído</option>
                        </select>
                    </div>

                    <div class="input-group input-periodo-projeto">
                        <label>Período</label>
                        <div>
                            <input type="date">
                            <input type="date">
                        </div>
                    </div>
                    
                    <button type="submit" class="botao-texto botao-preto">Filtrar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function FecharFiltrarProjeto() {
        let filtrarProjeto = document.getElementById("filtrarProjeto");
        filtrarProjeto.style.display = "none";
    }

    function AbrirFiltrarProjeto() {
        let filtrarProjeto = document.getElementById("filtrarProjeto");
        filtrarProjeto.style.display = "block";
    }
</script>