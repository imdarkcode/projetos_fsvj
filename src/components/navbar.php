<?php
    $id_usuario = $_GET["id_usuario"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
    $query_usuario = $mysqli -> query($sql);

    $row_usuario = $query_usuario -> fetch_assoc();
    $hierarquia = $row_usuario["HIERARQUIA"];
    $nome_usuario = $row_usuario["NOME"];

    $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON T.ID_TAREFA = UT.ID_TAREFA INNER JOIN FASES F ON T.ID_FASE = F.ID_FASE INNER JOIN PROJETOS P ON F.ID_PROJETO = P.ID_PROJETO WHERE UT.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
    $query_tarefas_atuais = $mysqli -> query($sql);

    $row_tarefas_atuais = $query_tarefas_atuais -> fetch_assoc();
    $quantidade_tarefas_atuais = $query_tarefas_atuais -> num_rows;
?>

<nav class="nav-container">
    <section class="nav-logo">
        <img class="logo" src="../../assets/images/logo_menu.svg" alt="Logo do software">                
    </section>

    <div class="mensagem-usuario">
        <p><?php echo "Olá, ".$nome_usuario; ?></p>
    </div>

    <section class="nav-menu">
        <h2>Menu</h2>

        <ul>
            <li>
                <div class="nav-menu-item">
                    <a href="../projetos/projetos.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-archive-fill"></i>Projetos</a>
                    <?php if ($hierarquia != "DIRETOR") {echo '<div><span>'.$quantidade_tarefas_atuais.'</span></div>';} ?>
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

        <?php
            if ($hierarquia == "VOLUNTÁRIO") {
                $sql = "SELECT DISTINCT P.ID_PROJETO, P.NOME FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
                $query_projetos_atuais = $mysqli -> query($sql);
                $quantidade_projetos_atuais = $query_projetos_atuais -> num_rows;
            }
            elseif ($hierarquia == "COORDENADOR") {
                $sql = "SELECT DISTINCT P.ID_PROJETO, P.NOME FROM PROJETOS P INNER JOIN USUARIOS_PROJETOS UP ON P.ID_PROJETO = UP.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
                $query_projetos_atuais = $mysqli -> query($sql);
                $quantidade_projetos_atuais = $query_projetos_atuais -> num_rows;
            }
            else {
                $sql = "SELECT DISTINCT P.ID_PROJETO, P.NOME FROM PROJETOS P WHERE P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
                $query_projetos_atuais = $mysqli -> query($sql);
                $quantidade_projetos_atuais = $query_projetos_atuais -> num_rows;
            }
        ?>

        <span><?php echo $quantidade_projetos_atuais;?></span>
        
        <ul>
            <?php
                while($row_projetos_atuais = $query_projetos_atuais -> fetch_assoc()) {
                    $id_projeto = $row_projetos_atuais["ID_PROJETO"];
                    $nome_projeto = $row_projetos_atuais["NOME"];

                    $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON T.ID_TAREFA = UT.ID_TAREFA INNER JOIN FASES F ON T.ID_FASE = F.ID_FASE INNER JOIN PROJETOS P ON F.ID_PROJETO = P.ID_PROJETO WHERE UT.ID_USUARIO = '$id_usuario' AND P.ID_PROJETO = '$id_projeto' AND P.DATA_INICIO <= CURRENT_DATE() AND P.DATA_TERMINO >= CURRENT_DATE()";
                    $query_tarefas_atuais = $mysqli -> query($sql);

                    $quantidade_tarefas_atuais = $query_tarefas_atuais -> num_rows;

                    echo '<li><div class="nav-projetos-item"><p class="nome-projeto">'.$nome_projeto.'</p>'.($hierarquia == "DIRETOR" ? '' : '<div><span>'.$quantidade_tarefas_atuais.'</span></div>').'</div></li>';
                }
            ?>
        </ul>
    </section>
</nav>