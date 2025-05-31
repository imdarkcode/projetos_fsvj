<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
    $query_usuario = $mysqli -> query($sql);

    $row_usuario = $query_usuario -> fetch_assoc();
    $hierarquia = $row_usuario["HIERARQUIA"];
    $nome_usuario = $row_usuario["NOME"];

    $sql = "SELECT COUNT(*) AS QUANTIDADE_TAREFAS FROM TAREFAS T WHERE T.ID_USUARIO = '$id_usuario'";
    $query_tarefa = $mysqli -> query($sql);

    $row_tarefa = $query_tarefa -> fetch_assoc();
    $quantidade_tarefas = $row_tarefa["QUANTIDADE_TAREFAS"];

    $sql = "SELECT COUNT(P.ID_PROJETO) AS QUANTIDADE_PROJETOS, P.ID_PROJETO, P.NOME, P.ID_COORDENADOR FROM PROJETOS P WHERE P.ID_USUARIO = '$id_usuario' AND P.DATA_TERMINO	< CURRENT_DATE()";
    $query_projeto_atual = $mysqli -> query($sql);

    $row_projeto_atual = $query_projeto_atual -> fetch_assoc();
    $quantidade_projetos_atuais = $row_projeto_atual["QUANTIDADE_PROJETOS"];

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Projetos FSVJ - Projetos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="projetos.css" />
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
    </head>

    <body>
        
        <?php include("../../components/navbar.php"); ?>

        <main class="main-container">
            <section class="main-header">
                <h1>Projetos</h1>
                <div class="botoes-header">
                    <?php if ($hierarquia == "DIRETOR") {echo '<button class="adicionar"><i class="bi bi-plus-lg"></i> Adicionar Projeto</button>';} ?>
                    <button class="filtrar"><i class="bi bi-funnel-fill"></i> Filtrar</button>
                </div>
            </section>

            <section class="projeto-container">
                <div class="projeto-header">
                    <div class="titulo-projeto">
                        <h2>Nome do Projeto</h2>
                        <p>Nome do Coodenador</p>
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
                    <div class="progresso progresso-vazio"></div>
                </div>                 
            </section>

            <section id="fasesProjeto" class="fases-container">
                <div class="fase">
                    <div>
                        <h2>Fase</h2>
                        <p>Concluído</p>
                    </div>
                    <div class="link-tarefas">
                        <a href="#">Ver Tarefas<i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
<<<<<<< HEAD
=======
                <div class="fase-divisor"></div>
>>>>>>> 5800e3d97df8e094460f2ea7145b117415a2a54a
            </section>
        </main>

        <script src="projetos.js"></script>
    </body>
</html>
