<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_fase = $_GET["id_fase"];
    $nome_tarefa = $_GET["nome_tarefa"];
    $data_vencimento = $_GET["data_vencimento"];
    $descricao = $_GET["descricao"];

    $sql = "SELECT * FROM FASES F WHERE F.DATA_TERMINO >= '$data_vencimento'";
    $query_fase = $mysqli -> query($sql);

    if ($query_fase -> num_rows > 0) {
        $sql = "INSERT INTO TAREFAS (NOME, DESCRICAO, DATA_VENCIMENTO, ID_FASE) VALUES ('$nome_tarefa', '$descricao', '$data_vencimento', '$id_fase')";
        $mysqli -> query($sql);
    }

    header("Location: ../pages/fase/fase.php?id_usuario=$id_usuario&id_fase=$id_fase");
?>