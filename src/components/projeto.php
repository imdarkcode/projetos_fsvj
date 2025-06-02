<section id="projeto<?php echo $id_projeto; ?>" class="projeto-container">
    <div class="projeto-header">
        <div class="titulo-projeto">
            <h2><?php echo $row_projeto["NOME"]; ?></h2>
            <p><?php echo $row_coordenador["NOME"]; ?></p>
        </div>
        <div class="botoes-projeto">
            <?php if ($hierarquia == "DIRETOR") {echo '<button id="btnExcluirProjeto'.$id_projeto.' onclick="ExcluirProjeto()"><i class="bi bi-trash3-fill"></i></button>';} ?>
            <?php if ($hierarquia == "COORDENADOR") {echo '<button id="btnAdcionarFase'.$id_projeto.' onclick="AdicionarFase()><i class="bi bi-plus-lg"></i></button>';} ?>
            <?php if ($hierarquia == "DIRETOR") {echo '<button id="btnEditarProjeto'.$id_projeto.' onclick="EditarProjeto()><i class="bi bi-sliders"></i></button>';} ?>
            <?php if ($hierarquia != "VOLUNTARIO") {echo '<button id="btnParticipantesProjeto'.$id_projeto.' onclick="ParticipantesProjeto()><i class="bi bi-people-fill"></i></button>';} ?>

            <button><i class="bi bi-info"></i></button>
            <button id="btnExibirFases<?php echo $id_projeto; ?>" onclick="ExibirFases<?php echo $id_projeto;?>()"><i class="bi bi-caret-down-fill"></i></button>
            <button id="btnEsconderFases<?php echo $id_projeto; ?>" class="btnEsconderFases" onclick="EsconderFases<?php echo $id_projeto;?>()"><i class="bi bi-caret-up-fill"></i></button>
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

<section id="fasesProjeto<?php echo $id_projeto;?>" class="fases-container">
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

<script>
    function ExibirFases<?php echo $id_projeto;?>() {
        let fasesProjeto = document.getElementById("fasesProjeto<?php echo $id_projeto;?>");
        let btnExibirFases = document.getElementById("btnExibirFases<?php echo $id_projeto;?>");
        let btnEsconderFases = document.getElementById("btnEsconderFases<?php echo $id_projeto;?>");

        btnExibirFases.style.display = "none";
        btnEsconderFases.style.display = "block";
        fasesProjeto.style.display = "block"
    }

    function EsconderFases<?php echo $id_projeto;?>() {
        let fasesProjeto = document.getElementById("fasesProjeto<?php echo $id_projeto;?>");
        let btnExibirFases = document.getElementById("btnExibirFases<?php echo $id_projeto;?>");
        let btnEsconderFases = document.getElementById("btnEsconderFases<?php echo $id_projeto;?>");

        btnExibirFases.style.display = "block";
        btnEsconderFases.style.display = "none";
        fasesProjeto.style.display = "none"
    }
</script>