<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
    $id_fase = $_GET["id_fase"];

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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projetos FSVJ - Tarefas</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="fase.css" />
        <link rel="stylesheet" href="../../styles/components/navbar.css" />
        <link rel="stylesheet" href="../../styles/components/tarefa.css" />
    </head>
    <body>
       
        <?php include("../../components/navbar.php"); ?>

        <main>
            <section class="main-header">
                <div class="titulo-container">
                    <button class="btn-voltar"><i class="bi bi-arrow-left"></i></button>
                    <div class="titulo">
                        <p>Nome do projeto</p>
                        <h1>Fase</h1>                    
                    </div>
                </div>
                
                <div class="botoes-header">
                    <?php if ($hierarquia != "VOLUNTARIO") {echo '<button><i class="bi bi-download"></i> Baixar Relatório</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button><i class="bi bi-trash-fill"></i> Excluir Fase</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button><i class="bi bi-sliders"></i> Editar Fase</button>';} ?>
                    <?php if ($hierarquia != "VOLUNTARIO") {echo '<button><i class="bi bi-info"></i> Informações</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button><i class="bi bi-plus-lg"></i> Criar Tarefa</button>';} ?>      
                </div>
            </section>
            <section class="kanban-container">
                <div class="kanban-coluna">
                    <?php
                        if ($hierarquia == "VOLUNTARIO") {
                            $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else if ($hierarquia == "COORDENADOR") {
                            $sql = "SELECT * FROM projetos P INNER JOIN fase F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_PROJETO = '$id_fase'";
                            $query_projeto = $mysqli -> query($sql);
                            $row_projeto = $query_projeto -> fetch_assoc();

                            if ($row_projeto["ID_COORDENADOR"] = $id_usuario) {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                            else {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER' AND UT.ID_USUARIO = '$id_usuario'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                        }
                    ?>

                    <h2>A fazer<span>(<?php echo $query_tarefa -> num_rows; ?>)</span></h2>

                    <?php
                        while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
                            $nome_tarefa = $row_tarefa["NOME"];
                            $descricao = $row_tarefa["DESCRICAO"];
                            $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
    
                            include("../../components/tarefa.php");
                        }

                    ?>
                </div>
    
                <div class="kanban-coluna">
                    <?php
                        if ($hierarquia == "VOLUNTARIO") {
                            $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'EM ANDAMENTO' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else if ($hierarquia == "COORDENADOR") {
                            $sql = "SELECT * FROM projetos P INNER JOIN fase F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_PROJETO = '$id_fase'";
                            $query_projeto = $mysqli -> query($sql);
                            $row_projeto = $query_projeto -> fetch_assoc();

                            if ($row_projeto["ID_COORDENADOR"] = $id_usuario) {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'EM ANDAMENTO'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                            else {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'EM ANDAMENTO' AND UT.ID_USUARIO = '$id_usuario'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                        }
                    ?>

                    <h2>Em andamento<span>(<?php echo $query_tarefa -> num_rows; ?>)</span></h2>

                    <?php
                        while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
                            $nome_tarefa = $row_tarefa["NOME"];
                            $descricao = $row_tarefa["DESCRICAO"];
                            $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
    
                            include("../../components/tarefa.php");
                        }

                    ?>
                </div>
    
                <div class="kanban-coluna">
                    <?php
                        if ($hierarquia == "VOLUNTARIO") {
                            $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'CONCLUIDO' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else if ($hierarquia == "COORDENADOR") {
                            $sql = "SELECT * FROM projetos P INNER JOIN fase F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_PROJETO = '$id_fase'";
                            $query_projeto = $mysqli -> query($sql);
                            $row_projeto = $query_projeto -> fetch_assoc();

                            if ($row_projeto["ID_COORDENADOR"] = $id_usuario) {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'CONCLUIDO'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                            else {
                                $sql = "SELECT * FROM tarefas T INNER JOIN usuarios_tarefas UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'CONCLUIDO' AND UT.ID_USUARIO = '$id_usuario'";
                                $query_tarefa = $mysqli -> query($sql);
                            }
                        }
                    ?>

                    <h2>Concluídas<span>(<?php echo $query_tarefa -> num_rows; ?>)</span></h2>

                    <?php
                        while ($row_tarefa = $query_tarefa -> fetch_assoc()) {
                            $nome_tarefa = $row_tarefa["NOME"];
                            $descricao = $row_tarefa["DESCRICAO"];
                            $data_vencimento = $row_tarefa["DATA_VENCIMENTO"];
    
                            include("../../components/tarefa.php");
                        }

                    ?>
                </div>      
            </section>
        </main>        
    </body>
</html>