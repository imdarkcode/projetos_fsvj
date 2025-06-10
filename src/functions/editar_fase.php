<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_fase = $_GET["id_fase"];
    $nome_fase = $_GET["nome_fase"];
    $data_inicio = $_GET["data_inicio"];
    $data_termino = $_GET["data_termino"];
    $escopo = $_GET["escopo"];

    $sql = "SELECT * FROM FASES F INNER JOIN PROJETOS P ON F.ID_PROJETO = P.ID_PROJETO WHERE F.ID_FASE = '$id_fase' AND P.DATA_INICIO <= '$data_inicio' AND P.DATA_TERMINO >= '$data_termino'";
    $query_fase = $mysqli -> query($sql);

    if ($query_fase -> num_rows > 0) {
        $sql = "UPDATE FASES SET NOME = '$nome_fase', ESCOPO = '$escopo', DATA_INICIO = '$data_inicio', DATA_TERMINO = '$data_termino'";
        $mysqli -> query($sql);
    }
    
    header("Location: ../pages/fase/fase.php?id_usuario=$id_usuario&id_fase=$id_fase");
?>