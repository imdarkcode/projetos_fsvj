<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Projetos FSVJ - Projetos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="shortcut icon" href="../../assets/images/favicon.svg">
        <link rel="stylesheet" href="projetos.css" />
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
        <link rel="stylesheet" href="../../styles/components/projeto.css" />
    </head>

    <body>
        
        <?php include("../../components/navbar.php"); ?>
        <?php include("../../components/informacoes_projeto.php"); ?>
        <?php include("../../components/participantes_projeto.php"); ?>
        <?php include("../../components/editar_projeto.php"); ?>
        <?php include("../../components/adicionar_projeto.php"); ?>
        <?php include("../../components/excluir_projeto.php"); ?>
        <?php include("../../components/filtrar_projeto.php"); ?>
        <?php include("../../components/adicionar_fase.php"); ?>
        
        <main class="main-container">
            <section class="main-header">
                <h1>Projetos</h1>
                <div class="botoes-header">
                    <?php if ($hierarquia == "DIRETOR") {echo '<button class="adicionar" onclick="AbrirAdicionarProjeto()"><i class="bi bi-plus-lg"></i> Adicionar Projeto</button>';} ?>
                    <button class="filtrar" onclick="AbrirFiltrarProjeto()"><i class="bi bi-funnel-fill"></i>Filtrar</button>
                </div>
            </section>

            <?php
                include("../../components/projeto.php");
            ?>
        </main>
    </body>
</html>
