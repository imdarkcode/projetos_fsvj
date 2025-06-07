<?php
    $sql = "SELECT * FROM PROJETOS P LEFT JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE P.ID_COORDENADOR = '$id_usuario'";
    $query_projeto = $mysqli -> query($sql);

    while ($row_projeto = $query_projeto -> fetch_assoc()) {
        echo '
            <section id="adicionarFase'.$id_projeto.'" class="fundo-modal">
                <div class="modal-grande">
                    <div class="modal-header">
                        <h2>Adicionar fase</h2>
                        <i class="bi bi-x-lg" onclick=FecharAdicionarFase'.$id_projeto.'()></i>
                    </div>

                    <form class="modal-conteudo">
                        <div class="input-container">
                            <label class="label">Nome da fase</label>
                            <input type="text" class="input" placeholder="Nome da Fase">
                        </div>

                        <div class="input-coluna">
                            <div class="input-container">
                                <label class="label">Data de início</label>
                                <input type="date" class="input">
                            </div>

                            <div class="input-container">
                                <label class="label">Data de termino</label>
                                <input type="date" class="input">
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Escopo</label>
                            <textarea class="textarea" placeholder="Escopo da fase"></textarea>
                        </div>

                        <div class="input-container">
                            <label class="label">Gastos</label>
                            <div class="input-grupo">
                                <input type="text" class="input" placeholder="Destino do gasto">
                                <input type="text" class="input-pequeno" placeholder="Valor">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Equipamentos utilizados</label>
                            <div class="input-grupo">
                                <input type="text" class="input" placeholder="Nome do equipamento">
                                <input type="text" class="input-pequeno" placeholder="Quantidade">
                                <button class="botao-pequeno fundo-preto"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>

                        <button class="botao-form fundo-preto">Adicionar Fase</button>
                    </form>
                </div>
            </section>

            <script>
                function FecharAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "none";
                }

                function AbrirAdicionarFase'.$id_projeto.'() {
                    let adicionarFase = document.getElementById("adicionarFase'.$id_projeto.'");
                    adicionarFase.style.display = "flex";
                }
            </script>
        ';
    }
?>
