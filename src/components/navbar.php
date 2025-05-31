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
                <div class="nav-item-projetos">
                    <a href="../projetos/projetos.php?id_usuario=<?php echo $id_usuario; ?>"><i class="bi bi-archive-fill"></i>Projetos</a>
                    <?php if ($hierarquia != "DIRETOR") {echo '<div><span>'.$quantidade_tarefas.'</span></div>';} ?>
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
        <span><?php echo $quantidade_projetos_atuais;?></span>
        
        <ul>
            <?php
                while($row_projeto_atual = $query_projeto_atual -> fetch_assoc()) {
                    echo '<li><p class="nome-projeto">'.$row_projeto_atual["NOME"].'</p></li>';
                }
            ?>
        </ul>
    </section>
</nav>