<nav class="nav-container">
    <section class="nav-logo">
        <img class="logo" src="../../assets/images/logo_menu.svg" alt="Logo do software">                
    </section>

    <div class="mensagem-usuario">
        <p><?php echo "Olá, ". $nome_usuario; ?></p>
    </div>

    <section class="nav-menu">
        <h2>Menu</h2>

        <ul>
            <li>
                <div class="nav-menu-item">
                    <a href="../projetos/projetos.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-archive-fill"></i>Projetos</a>
                    <?php if ($hierarquia != "DIRETOR") {echo '<div><span>'.$quantidade_tarefa.'</span></div>';} ?>
                </div>
            </li>

            <?php if ($hierarquia == "DIRETOR") {echo '<li><a href="../usuarios/usuarios.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-people-fill"></i>Usuário</a></li>';} ?>
            <?php if ($hierarquia == "DIRETOR") {echo '<li><a href="../locais/locais.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-geo-alt-fill"></i>Locais</a></li>';} ?>
            
            <li><a href="../perfil/perfil.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-person-circle"></i>Perfil</a></li>
            <li><a href="../../../index.php"><i class="bi bi-box-arrow-right"></i>Sair</a></li>
        </ul>
    </section>

    <section class="nav-projetos">
        <h2>Projetos Atuais</h2>
        <span><?php echo $quantidade_projeto_atual;?></span>
        
        <ul>
            <?php
                while($row_projeto_atual = $query_projeto_atual -> fetch_assoc()) {
                    $id_projeto = $row_projeto_atual["ID_PROJETO"];
                    $sql = "SELECT COUNT(*) AS QUANTIDADE_TAREFA FROM USUARIOS_TAREFAS UT INNER JOIN TAREFAS T ON UT.ID_TAREFA = T.ID_TAREFA INNER JOIN FASES F ON T.ID_FASE = F.ID_FASE INNER JOIN PROJETOS P ON F.ID_PROJETO = P.ID_PROJETO WHERE UT.ID_USUARIO = '$id_usuario' AND P.ID_PROJETO = '$id_projeto' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
                    $query_quantidade_tarefa = $mysqli -> query($sql);
                    $row_quantidade_tarefa = $query_quantidade_tarefa -> fetch_assoc();

                    echo '<li><div class="nav-projetos-item"><p class="nome-projeto">'.$row_projeto_atual["NOME"].'</p><div><span>'.$row_quantidade_tarefa["QUANTIDADE_TAREFA"].'</span></div></div></li>';
                }
            ?>
        </ul>
    </section>
</nav>