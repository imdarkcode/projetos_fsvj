<?php
    include("../../../conexao.php");
    $id_usuario = $_GET["id_usuario"];
    $id_fase = $_GET["id_fase"];
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
        <link rel="stylesheet" href="../../styles/components/informacoes_tarefa.css" />
        <link rel="stylesheet" href="../../styles/components/informacoes_fase.css" />
        <link rel="stylesheet" href="../../styles/components/editar_fase.css" />
        <link rel="stylesheet" href="../../styles/components/excluir_fase.css" />
    </head>

    <body>
        <?php include("../../components/navbar.php"); ?>
        <?php include("../../components/informacoes_tarefa.php"); ?>
        <?php include("../../components/informacoes_fase.php"); ?>
        <?php include("../../components/editar_fase.php"); ?>
        <?php include("../../components/excluir_fase.php"); ?>

        <?php
            $sql = "SELECT P.NOME AS NOME_PROJETO, F.NOME AS NOME_FASE, P.ID_COORDENADOR, F.ESTADO AS ESTADO_FASE FROM PROJETOS P INNER JOIN FASES F ON P.ID_PROJETO = F.ID_PROJETO WHERE F.ID_FASE = '$id_fase'";
            $query_projeto_fase = $mysqli -> query($sql);

            $row_projeto_fase = $query_projeto_fase -> fetch_assoc();
            $nome_projeto = $row_projeto_fase["NOME_PROJETO"];
            $nome_fase = $row_projeto_fase["NOME_FASE"];
            $id_coordenador = $row_projeto_fase["ID_COORDENADOR"];
            $estado_fase = $row_projeto_fase["ESTADO_FASE"];
        ?>

        <main>
            <section class="main-header">
                <div class="titulo-container">
                    <button class="btn-voltar"><i class="bi bi-arrow-left"></i></button>
                    <div class="titulo">
                        <p><?php echo $nome_projeto; ?></p>
                        <h1><?php echo $nome_fase; ?></h1>                    
                    </div>
                </div>
                
                <div class="botoes-header">
                    <?php if ($hierarquia != "VOLUNTÁRIO" and $estado_fase == "CONCLUÍDA") {echo '<button class="botao-verde"><i class="bi bi-download"></i> Baixar Relatório</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button class="botao-vermelho" onclick="AbrirExcluirFase()"><i class="bi bi-trash-fill"></i> Excluir Fase</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button class="botao-cinza" onclick="AbrirEditarFase()"><i class="bi bi-sliders"></i> Editar Fase</button>';} ?>
                    <?php if ($hierarquia != "VOLUNTÁRIO") {echo '<button class="botao-laranja" onclick="AbrirInformacoesFase()"><i class="bi bi-info"></i> Informações</button>';} ?>
                    <?php if ($hierarquia == "COORDENADOR") {echo '<button class="botao-preto" onclick="AbrirCriarTarefa()"><i class="bi bi-plus-lg"></i> Criar Tarefa</button>';} ?>      
                </div>
            </section>

            <section class="kanban-container">
                <div class="kanban-coluna">
                    <?php
                        if ($hierarquia == "VOLUNTÁRIO" or $hierarquia == "COORDENADOR" and $id_coordenador != $id_usuario) {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'A FAZER'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                    ?>

                    <h2>A fazer<span>(<?php echo $query_tarefa -> num_rows; ?>)</span></h2>

                    <?php
                        include("../../components/tarefa.php");
                    ?>
                </div>
    
                <div class="kanban-coluna">
                    <?php
                        if ($hierarquia == "VOLUNTÁRIO" or $hierarquia == "COORDENADOR" and $id_coordenador != $id_usuario) {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'EM ANDAMENTO' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'EM ANDAMENTO'";
                            $query_tarefa = $mysqli -> query($sql);
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
                        if ($hierarquia == "VOLUNTÁRIO" or $hierarquia == "COORDENADOR" and $id_coordenador != $id_usuario) {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'CONCLUÍDA' AND UT.ID_USUARIO = '$id_usuario'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                        else {
                            $sql = "SELECT * FROM TAREFAS T INNER JOIN USUARIOS_TAREFAS UT ON UT.ID_TAREFA = T.ID_TAREFA WHERE T.ESTADO = 'CONCLUÍDA'";
                            $query_tarefa = $mysqli -> query($sql);
                        }
                    ?>

                    <h2>Concluída<span>(<?php echo $query_tarefa -> num_rows; ?>)</span></h2>

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