<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];

    $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_usuario'";
    $query_usuario = $mysqli -> query($sql);

    $row_usuario = $query_usuario -> fetch_assoc();
    $hierarquia = $row_usuario["HIERARQUIA"];
    $nome_usuario = $row_usuario["NOME"];

    $sql = "SELECT * FROM USUARIOS_TAREFAS UT INNER JOIN TAREFAS T ON UT.ID_TAREFA = T.ID_TAREFA INNER JOIN FASES F ON T.ID_FASE = F.ID_FASE INNER JOIN PROJETOS P ON F.ID_PROJETO = P.ID_PROJETO WHERE UT.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
    $query_usuario_tarefa = $mysqli -> query($sql);

    $row_usuario_tarefa = $query_usuario_tarefa -> fetch_assoc();
    $quantidade_tarefa = $query_usuario_tarefa -> num_rows;

    if ($hierarquia == "VOLUNTARIO") {
        $sql = "SELECT * FROM PROJETOS P INNER JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
        $query_projeto_atual = $mysqli -> query($sql);
        $quantidade_projeto_atual = $query_projeto_atual -> num_rows;
    }
    elseif ($hierarquia == "COORDENADOR") {
        $sql = "SELECT * FROM PROJETOS P INNER JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
        $query_projeto_atual = $mysqli -> query($sql);
        $quantidade_projeto_atual = $query_projeto_atual -> num_rows;
    }
    else {
        $sql = "SELECT * FROM PROJETOS P WHERE P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
        $query_projeto_atual = $mysqli -> query($sql);
        $quantidade_projeto_atual = $query_projeto_atual -> num_rows;
    }
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
        <link rel="stylesheet" href="../../styles/components/projeto.css" />
        <link rel="stylesheet" href="../../styles/components/informacoes_projeto.css" />
    </head>

    <body>
        
        <?php include("../../components/navbar.php"); ?>
        <?php include("../../components/informacoes_projeto.php"); ?>

        <main class="main-container">
            <section class="main-header">
                <h1>Projetos</h1>
                <div class="botoes-header">
                    <?php if ($hierarquia == "DIRETOR") {echo '<button class="adicionar"><i class="bi bi-plus-lg"></i> Adicionar Projeto</button>';} ?>
                    <button class="filtrar"><i class="bi bi-funnel-fill"></i> Filtrar</button>
                </div>
            </section>

            <?php
                if ($hierarquia == "VOLUNTARIO") {
                    $sql = "SELECT * FROM PROJETOS P INNER JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE()";
                    $query_projeto = $mysqli -> query($sql);
                }

                elseif ($hierarquia == "COORDENADOR") {
                    $sql = "SELECT * FROM PROJETOS P LEFT JOIN usuarios_projetos UP ON UP.ID_PROJETO = P.ID_PROJETO WHERE UP.ID_USUARIO = '$id_usuario' AND P.DATA_INICIO < CURRENT_DATE() AND P.DATA_TERMINO > CURRENT_DATE() OR P.ID_COORDENADOR = '$id_usuario'";
                    $query_projeto = $mysqli -> query($sql);
                }

                else {
                    $sql = "SELECT * FROM PROJETOS P";
                    $query_projeto = $mysqli -> query($sql);
                }

                while ($row_projeto = $query_projeto -> fetch_assoc()) {
                        $id_projeto = $row_projeto["ID_PROJETO"];
                        $id_coordenador = $row_projeto["ID_COORDENADOR"];

                        $sql = "SELECT * FROM USUARIOS U WHERE U.ID_USUARIO = '$id_coordenador'";
                        $query_coordenador = $mysqli -> query($sql);
                        $row_coordenador = $query_coordenador -> fetch_assoc();

                        include("../../components/projeto.php");
                    }
            ?>
        </main>

        <script src="projetos.js"></script>
    </body>
</html>
