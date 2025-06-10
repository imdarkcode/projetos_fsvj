<?php
    include("../../conexao.php");

    $id_usuario = $_GET["id_usuario"];
    $id_fase = $_GET["id_fase"];

    $sql = "DELETE FROM FASES WHERE ID_FASE = '$id_fase'";
    $mysqli -> query($sql);
    header("Location: ../pages/projetos/projetos.php?id_usuario=$id_usuario");
?>