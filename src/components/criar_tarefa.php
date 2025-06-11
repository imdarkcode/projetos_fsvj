<?php   
        echo '
            <section id="criarTarefa" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Criar tarefa</h2>
                        <i class="bi bi-x-lg" onclick=FecharCriarTarefa()></i>
                    </div>

                    <form method="GET" action="../../functions/criar_tarefa.php" class="modal-conteudo">
                        <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                        <input type="hidden" name="id_fase" value="'.$id_fase.'">

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Nome da tarefa</label>
                                <input type="text" name="nome_tarefa" class="input fundo-cinza-claro" placeholder="Nome da tarefa">
                            </div>

                            <div class="input-container">
                                <label class="label">Data de término</label>
                                <input type="date" name="data_vencimento" class="input fundo-cinza-claro">
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Descrição</label>
                            <textarea class="textarea fundo-cinza-claro" name="descricao" placeholder="Descrição da tarefa"></textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Participante</label>
                            <div class="input-grupo">
                                <input type="text" class="input fundo-cinza-claro" placeholder="Nome do usuário">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <button type="submit" class="botao-form fundo-preto">Criar tarefa</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharCriarTarefa() {
                    let criarTarefa = document.getElementById("criarTarefa");
                    criarTarefa.style.display = "none";
                }

                function AbrirCriarTarefa() {
                    let criarTarefa = document.getElementById("criarTarefa");
                    criarTarefa.style.display = "flex";
                }
            </script>
        ';
?>