<section class="projeto-container">
    <div class="projeto-header">
        <div class="titulo-projeto">
            <h2><?php echo $row_projeto["NOME"]; ?></h2>
            <p><?php echo $row_coordenador["NOME"]; ?></p>
        </div>
        <div class="botoes-projeto">
            <?php if ($hierarquia == "DIRETOR") {echo '<button><i class="bi bi-trash3-fill"></i></button>';} ?>
            <?php if ($hierarquia == "COORDENADOR") {echo '<button><i class="bi bi-plus-lg"></i></button>';} ?>
            <?php if ($hierarquia == "DIRETOR") {echo '<button><i class="bi bi-sliders"></i></button>';} ?>
            <?php if ($hierarquia != "VOLUNTARIO") {echo '<button><i class="bi bi-people-fill"></i></button>';} ?>

            <button><i class="bi bi-info"></i></button>
            <button id="btnExibirFases" onclick="ExibirFases()"><i class="bi bi-caret-down-fill"></i></button>
            <button id="btnEsconderFases" onclick="EsconderFases()"><i class="bi bi-caret-up-fill"></i></button>
        </div>                      
    </div>

    <div class="progresso-container">
        <?php 
            $sql = "SELECT * FROM FASES F WHERE F.ID_PROJETO = '$id_projeto'";
            $query_fase = $mysqli -> query($sql);

            while ($row_fase = $query_fase -> fetch_assoc()) {
                if ($row_fase["ESTADO"] == "Concluída") {
                    echo '<div class="progresso progresso-cheio"></div>';
                }
                else {
                    echo '<div class="progresso progresso-vazio"></div>';
                }
            }
        ?>
    </div>                 
</section>

<section id="fasesProjeto" class="fases-container">
    <?php 
        $sql = "SELECT * FROM FASES F WHERE F.ID_PROJETO = '$id_projeto'";
        $query_fase = $mysqli -> query($sql);
        $contador = $query_fase -> num_rows;

        while ($row_fase = $query_fase -> fetch_assoc()) {
            echo '
                <div class="fase">
                    <div>
                        <h2>'.$row_fase["NOME"].'</h2>
                        <p>'.$row_fase["ESTADO"].'</p>
                    </div>
                    <div class="link-tarefas">
                        <a href="../fase/fase.php?id_usuario='.$id_usuario.'&id_fase='.$row_fase["ID_FASE"].'">Ver Tarefas<i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            ';

            if ($contador > 1) {
                echo '<div class="fase-divisor"></div>';
                $contador -= 1;
            }
        }
    ?>
</section>