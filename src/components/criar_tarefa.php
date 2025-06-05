<?php   
        echo '
            <section id="criarTarefa" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Criar tarefa</h2>
                        <i class="bi bi-x-lg" onclick=FecharCriarTarefa()></i>
                    </div>

                    <div class="modal-conteudo">
                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Nome da tarefa</label>
                                <input type="text" class="input" placeholder="Nome da tarefa">
                            </div>

                            <div class="input-container">
                                <label class="label">Data de vencimento</label>
                                <input type="date" class="input">
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Descrição</label>
                            <textarea class="textarea" placeholder="Descrição da tarefa"></textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Participante</label>
                            <div class="input-grupo">
                                <input type="text" class="input" placeholder="Nome do usuário">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <button class="botao-form fundo-preto">Criar tarefa</button>
                    </div>
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