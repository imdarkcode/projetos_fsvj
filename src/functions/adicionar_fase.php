<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_projeto = $_GET["id_projeto"];
    $nome_fase = $_GET["nome_fase"];
    $data_inicio = $_GET["data_inicio"];
    $data_termino = $_GET["data_termino"];
    $escopo = $_GET["escopo"];

    $sql = "SELECT * FROM PROJETOS P WHERE P.ID_PROJETO = '$id_projeto' AND DATA_INICIO <= '$data_inicio' AND DATA_TERMINO >= '$data_termino'";
    $query_projeto = $mysqli -> query($sql);

    if ($query_projeto -> num_rows > 0) {
        $sql = "INSERT INTO FASES (NOME, ESCOPO, DATA_INICIO, DATA_TERMINO, ID_PROJETO) VALUES ('$nome_fase', '$escopo', '$data_inicio', '$data_termino', '$id_projeto')";
        $mysqli -> query($sql);
    }
    
    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>